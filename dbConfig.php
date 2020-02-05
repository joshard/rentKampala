<?php
// Database configguration
//$imageURL ='';
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "photos";

//create database connection
$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbname);

//Check connection
if(!$db){
	die("Connection failed: ". $db->connection_error);
}
?>