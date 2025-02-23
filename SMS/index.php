<?php
extract($_POST);
extract($_GET);
date_default_timezone_set("Africa/Cairo");


// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "schooltrans";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT CONCAT(p.name, ' ', p.lastname) pupil, u.phone, d.id dependent_id FROM pupils p INNER JOIN dependants d ON d.pupil_id=p.id INNER JOIN users u ON d.user_id=u.id WHERE p.reference = '$reference'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $student = $row['pupil'];
    $phone = $row['phone'];
    $dependent_id = $row['dependent_id'];
}

$exist = checkTransport($dependent_id, $conn);

if(isset($type)){
    if($type == "HS"){
        if (!$exist) {
            $message = $student." Picked at Home at ".date("H:i");
            insertTransport($dependent_id, $conn);
        } else{
            $response["success"] = false;
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    } else if($type == "AH"){
        if ($exist){
            if (!checkHour($dependent_id, "AH", $conn))
                $message = $student." arrived at Home at ".date("H:i");
            updateTransport($dependent_id, $conn, "AH");
        }
    } else if($type == "SH"){
        if ($exist){
            if (!checkHour($dependent_id, "SH", $conn))
                $message = $student." Picked at School at ".date("H:i");
            updateTransport($dependent_id, $conn, "SH");
        }
    } else{
        if ($exist) {
            if (!checkHour($dependent_id, "AS", $conn))
                $message = $student." arrived at School at ".date("H:i");
            updateTransport($dependent_id, $conn, "AS");
        }
    }

    if (isset($message)){
        $messages = array(
            array(
                "from" => "SAMU",
                "to" => $phone,
                "body" => $message,
                "encoding" => "TEXT"
            )
        );

        $result = send_message( json_encode($messages), 'http://api.bulksms.com/v1/messages?auto-unicode=true&longMessageMaxParts=30');

        if ($result['http_status'] != 201) {
            print "Error sending: " . ($result['error'] ? $result['error'] : "HTTP status ".$result['http_status']."; Response was " .$result['server_response']);
        } else {
            //print "Response " . $result['server_response'];
            // Use json_decode($result['server_response']) to work with the response further
            $response["success"] = true;
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
}

function insertTransport($dependent_id, $connexion): void
{
    $sql = "INSERT INTO transports(assignment_id, dependant_id, pickupathome, dropoffatschool, pickupschool, dropoffathome, pickuplocation, dropofflocation, created, modified, createdby, modifiedby, deleted) VALUES (1,'$dependent_id',NOW(),null,null,null,'','',NOW(),NOW(),'System','System',0)";
    $result = $connexion->query($sql);
}

function checkTransport($dependent_id, $connexion): bool
{
    $sql = "SELECT COUNT(*) nber FROM transports WHERE dependant_id='$dependent_id' AND date_format(created, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d')";
    $result = $connexion->query($sql);
    $row = $result->fetch_assoc();
    return $row['nber'] > 0;
}

function checkHour($dependent_id, $type, $connexion): bool
{
    if ($type == "AS"){
        $sql = "SELECT dropoffatschool submitted FROM transports WHERE dependant_id='$dependent_id' AND date_format(created, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d')";
    } elseif ($type == "SH"){
        $sql = "SELECT pickupschool submitted FROM transports WHERE dependant_id='$dependent_id' AND date_format(created, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d')";
    } else{
        $sql = "SELECT dropoffathome submitted FROM transports WHERE dependant_id='$dependent_id' AND date_format(created, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d')";
    }
    $result = $connexion->query($sql);
    $row = $result->fetch_assoc();
    return $row['submitted'] <> "";
}

function updateTransport($dependent_id, $connexion, $type): void
{
    if ($type == 'AS'){
        $sql = "UPDATE transports SET dropoffatschool=NOW(), modified=NOW() WHERE date_format(created, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d') AND dependant_id='$dependent_id'";
    } elseif ($type == 'SH'){
        $sql = "UPDATE transports SET pickupschool=NOW(), modified=NOW() WHERE date_format(created, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d') AND dependant_id='$dependent_id'";
    } else{
        $sql = "UPDATE transports SET dropoffathome=NOW(), modified=NOW() WHERE date_format(created, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d') AND dependant_id='$dependent_id'";
    }
    $connexion->query($sql);
}

function send_message ($post_body, $url) {
    $ch = curl_init( );
    $headers = array(
        'Content-Type:application/json',
        'Authorization: Basic ' // Add Key
    );
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, 1 );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
    // Allow cUrl functions 20 seconds to execute
    curl_setopt ( $ch, CURLOPT_TIMEOUT, 20 );
    // Wait 10 seconds while trying to connect
    curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
    $output = array();
    $output['server_response'] = curl_exec( $ch );
    $curl_info = curl_getinfo( $ch );
    $output['http_status'] = $curl_info[ 'http_code' ];
    $output['error'] = curl_error($ch);
    curl_close( $ch );
    return $output;
}
