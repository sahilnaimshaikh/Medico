<?php
//  $servername = "localhost";
//  $username = "id16672531_sahil";
//  $password = "Sahilshaikh@2000";
//  $database = "id16672531_project";
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "ecom";

 $conn = mysqli_connect($servername, $username, $password, $database); // sql query for connecting to the server i.e localhost
if(!$conn){
echo"connection fail";

}

?>