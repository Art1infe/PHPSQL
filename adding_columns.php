<?php 


try{
   $pdo = new PDO("mysql:host=localhost; dbaname=new_db", username: "root", password: "");

   $sql = "ALTER TABLE users ADD email VARCHAR(255)";

   $pdo -> exec(statement: $sql);

   echo "Column created succesfullty";
}else(PDOException $e){
    echo "Error creating column", $e->getMessage();
}
?>