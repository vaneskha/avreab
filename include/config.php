<?php
global $con;
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "dumet";

$con = mysqli_connect($servername,$username,$password,$dbname);
if(!$con){
    die("Connection Failed:" . mysqli_connect_error());
}

?>