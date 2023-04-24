<?php
function OpenCon()
 {
 $dbhost = "localhost";     #db host where we are running the server.
 $dbuser = "root";          #username
 $dbpass = "";          #password
 $db = "TWSM---mini-project";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>