<?php
// parameters for connections
$servername = "localhost";
$username = "root";
$password = "";
$db = "institute";

// starting connection
$conn = mysqli_connect($servername,$username,$password,$db);

// testing connection
if($conn){
    //echo "connection  is oky";

}

?>