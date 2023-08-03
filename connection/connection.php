<?php
error_reporting(E_ALL);
$servername="localhost";
$username="root";
$password="";
//$dbname="databaseprofile";
$dbname="labvisitorsys";


$objCon=new mysqli($servername,$username,$password,$dbname);

if($objCon->connect_error)
{
	die("Connection Failed : ".$objCon->connect_error);
}

?>