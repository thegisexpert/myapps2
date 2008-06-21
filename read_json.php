<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(~0);


$json = file_get_contents("C:/Testrexx/event.json");
//var_dump($strJsonFileContents);
$arr = json_decode($json, TRUE);
echo "<html>";


$conn = mysqli_connect(
  'localhost:3307', 'root', '123456', 'participant'
);
// Check connection

if ( $conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


    foreach($arr as $item) { //foreach element in $arr

        //$uses = $item['$key']; //etc

        echo "<br>";

        print_r($item);
        echo   $item["participation_id"];

        // prepare and bind
        $stmt = $conn->prepare("REPLACE INTO participant SET participation_id=?, employee_name=?, employee_mail=?");
        $stmt->bind_param("sss",  $item["participation_id"], $item["employee_name"], $item["employee_mail"]);

        try {
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

         $stmt = $conn->prepare("REPLACE INTO event SET event_id=?, event_name=?, event_date=?, version=?");
        $stmt->bind_param("dsss", $item["event_id"], $item["event_name"],  $item["event_date"],  $item["version"]);
        $stmt->execute();



         $stmt = $conn->prepare("REPLACE INTO participant_event SET event_id=?, participation_fee=?, participation_id=?");
        $stmt->bind_param("dsd", $item["event_id"], $item["participation_fee"],  $item["participation_id="]);
        $stmt->execute();



    }
  echo "</html>";


 echo "JSON File imported";
error_reporting(~0);
?>