<?php
include_once("config.php");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users(name, username, email) VALUES(:name, :username, :email)";

    $sqlQuery = $connect->prepare(query: $sql);

    $sqlQuery->bindParam(param:':name', var: &$name);
    $sqlQuery->bindParam(param:':username', var: &$username);
    $sqlQuery->bindParam(param:':email', var: &$email);

    $sqlQuery->execute();

    echo "The user was added succesfully";
}
?>