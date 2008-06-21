<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(0);


$sql = file_get_contents("event.sql");

# MySQL with PDO_MYSQL

 $mysql_host= 'localhost:3307';
 $mysql_database='participant';
 $mysql_user="root";
 $mysql_password="123456";
$db = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);

$query = file_get_contents("event.sql");

$stmt = $db->prepare($query);

if ($stmt->execute()){
     echo "Success";
}else{
     echo "Fail";
}




?>
