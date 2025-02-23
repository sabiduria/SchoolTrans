<?php
extract($_POST);
extract($_GET);
date_default_timezone_set("Africa/Cairo");

if(isset($type)){
  if($type == "HS"){
    $message = $student." Picked at Home at ".date("H:i");
  } else if($type == "AH"){
    $message = $student." arrived at Home at ".date("H:i");
  } else if($type == "SH"){
    $message = $student." Picked at School at ".date("H:i");
  } else{
    $message = $student." arrived at School at ".date("H:i");
  }
  
  $messages = array(
    array(
      "from" => "SAMU",
      "to" => "+243999953581", 
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

function send_message ($post_body, $url) {
  $ch = curl_init( );
  $headers = array(
  'Content-Type:application/json',
  'Authorization: Basic OUJBN0MyMjU2MjFCNDlFN0JCQzU3ODIzNjhGQzNDNjEtMDItQzp3Rl9wSldwYjBYbThzckppUzc4cVlrbE5QMWZ5Mg=='
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

?>         
