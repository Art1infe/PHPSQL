<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = "testdb";

try{
    // $pdo = new PDO("mysql:host=$host; dbname=$db", username:$user, password: $pass);

    // $sql = "CREATE TABLE users(id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    // username VARCHAR(30) NOT NULL,
    // passqord VARCHAR(30) NOT NULL)";

    // $pdo -> exec(statement:$sql);
    // echo "Table created successfully";

    $username = "Jack";

    $password = password_hash(password:"mypassword", algo:PASSWORD_DEFAULT);

    $sql -> exec(statement: $sql);

    $last_id =  $pdo -> lastinsertedId();

    echo "New record created successfully"


}catch(Exception $e){
    // echo "Error creating table: ". $e->getMessage();
    echo "Error creating table: ". $e->getMessage();
}
?>