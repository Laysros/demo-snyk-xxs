<?php

$servername="127.0.0.1";
$dbusername="db";
$password="db-password";
$dBName="db";

$conn = mysqli_connect($servername, $dbusername, $password, $dBName);

if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}