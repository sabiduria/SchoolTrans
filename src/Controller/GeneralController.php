<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\I18n\DateTime;
use Cake\ORM\TableRegistry;

class GeneralController extends AppController
{
    /**
     * @return void
     */
    public function dashboard(): void
    {

    }

    /**
     * @param $table
     * @param $prefix
     * @return string
     */
    public static function generateReference($table, $prefix): string
    {
        $number = self::getCountAll($table);

        if ($number == 0 || $number == null) {
            $reference = '0000001';
        } elseif ($number > 0 && $number < 10) {
            $reference = '000000' . ($number + 1);
        } elseif ($number >= 10 && $number < 100) {
            $reference = '00000' . ($number + 1);
        } elseif ($number >= 100 && $number < 999) {
            $reference = '0000' . ($number + 1);
        } elseif ($number >= 1000 && $number < 9999) {
            $reference = '000' . ($number + 1);
        } elseif ($number >= 10000 && $number < 99999) {
            $reference = '00' . ($number + 1);
        } else {
            $reference = '0' . ($number + 1);
        }

        return $prefix . '-' . $reference;
    }

    /**
     * @param $table
     * @return mixed|null
     */
    public static function getCountAll($table): mixed
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute('SELECT COUNT(*) as nber FROM ' . strtolower($table));
        $result = $stmt->fetch('assoc');
        foreach ($result as $row) {
            return $row;
        }

        return null;
    }

    public static function getNameOf($id, $tableName): ?string
    {
        $table = TableRegistry::getTableLocator()->get($tableName)
            ->find()
            ->select(['name'])
            ->where(['id' => $id])
            ->first();

        return $table ? $table->name : null;
    }

    public static function getReferenceOf($id, $tableName): ?string
    {
        $table = TableRegistry::getTableLocator()->get($tableName)
            ->find()
            ->select(['reference'])
            ->where(['id' => $id])
            ->first();

        return $table ? $table->reference : null;
    }

    public static function getUserNameOf($id, $tableName): ?string
    {
        $table = TableRegistry::getTableLocator()->get($tableName);

        $user = $table->find()
            ->select([
                'name' => $table->query()->newExpr()->add([
                    'CONCAT(firstname, " ", lastname)'
                ])
            ])
            ->where(['id' => $id])
            ->first();

        return $user ? $user->name : null;
    }

    public static function getVehicleDetails($id): ?string
    {
        $table = TableRegistry::getTableLocator()->get('Vehicles');

        $data = $table->find()
            ->select([
                'name' => $table->query()->newExpr()->add([
                    'CONCAT(mark, " (", plate, ")")'
                ])
            ])
            ->where(['id' => $id])
            ->first();

        return $data ? $data->name : null;
    }

    static function dateDiffInDays($date1, $date2): float|int
    {
        $diff = strtotime($date2) - strtotime($date1);
        return abs(round($diff / 86400));
    }

    public static function getLastIdInsertedBy($username, $tableName): ?int
    {
        $table = TableRegistry::getTableLocator()->get($tableName)
            ->find()
            ->select(['id'])
            //->where(['createdby' => $username])
            ->orderByDesc('id')
            ->first();

        return $table ? $table->id : null;
    }

    public static function getShopIdFromRoom($room_id): ?int
    {
        $table = TableRegistry::getTableLocator()->get('Rooms')
            ->find()
            ->select(['shops_id'])
            ->where(['id' => $room_id])
            ->first();

        return $table ? $table->shops_id : null;
    }

    public static function getDependentName($dependent_id): mixed
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute("SELECT CONCAT('[', p.reference , '] ', p.name, ' ', p.lastname) as name FROM dependants d INNER JOIN pupils p ON p.id = d.pupil_id WHERE d.id = :id", ['id' => $dependent_id]);
        $result = $stmt->fetch('assoc');
        foreach ($result as $row) {
            return $row;
        }

        return null;
    }

    public static function getParentName($pupil_id): mixed
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute("SELECT u.name FROM dependants d INNER JOIN users u ON u.id = d.user_id WHERE d.pupil_id = :id", ['id' => $pupil_id]);
        $result = $stmt->fetch('assoc');
        foreach ($result as $row) {
            return $row;
        }

        return null;
    }

    public static function getParentPhone($pupil_id): mixed
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute("SELECT u.phone FROM dependants d INNER JOIN users u ON u.id = d.user_id WHERE d.pupil_id = :id", ['id' => $pupil_id]);
        $result = $stmt->fetch('assoc');
        foreach ($result as $row) {
            return $row;
        }

        return null;
    }

    public static function NewDependant($user_id, $pupil_id, $amount, $exempted, $username): void
    {
        $connection = ConnectionManager::get('default');

        $connection->insert('dependants', [
            'user_id' => $user_id,
            'pupil_id' => $pupil_id,
            'amount' => $amount,
            'exempted' => $exempted,
            'created' => new DateTime('now'),
            'modified' => new DateTime('now'),
            'createdby' => $username,
            'modifiedby' => $username,
            'deleted' => 0
        ], ['created' => 'datetime', 'modified' => 'datetime']);
    }

    public static function get_message()
    {
        // Note in the query string
        // we have a filter to get only the
        // SENT messages
        $myURI = "https://api.bulksms.com/v1/messages?filter=type%3DSENT";
        $myUsername = "sabiduria777";
        $myPassword = "SMS-$@b1antAr7";

        // Initialize a cURL session
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $myURI);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$myUsername:$myPassword"); // Basic authentication
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        // Execute the cURL request
        $response = curl_exec($ch);

        // Check for errors
        if(curl_errno($ch)) {
            echo "An error occurred: " . curl_error($ch);
            return null;
        }

        // Close cURL session
        curl_close($ch);

        // Return the response
        return $response;
    }
}
