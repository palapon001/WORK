<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "work";
$con= mysqli_connect($host,$user,$pass,$db);
if(!$con){
   die("condb err");
}
else{
    //echo "condb succ";
}
mysqli_query($con, "SET NAMES 'utf8' "); 
?>