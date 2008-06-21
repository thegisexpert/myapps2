<?php

$mysql_host= 'localhost:3307';
 $mysql_database='participant';
 $mysql_user="root";
 $mysql_password="123456";
$con = mysqli_connect($mysql_host, $mysql_user,$mysql_password,$mysql_database);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}