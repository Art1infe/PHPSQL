<?php
$server = 'localhost';
$username = "root";
$password = "";
$dbname = "another_db";

try{
    $connect = new PDO("mysql:host=$server;dbname=$dbname", username: $username, password: $password);
}catch(Excpetion $e){
    echo"Something went wrong"
}
?>
