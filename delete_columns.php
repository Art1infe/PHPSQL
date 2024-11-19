<?php 


try{
   $pdo = new PDO("mysql:host=localhost; dbaname=new_db", username: "root", password: "");

   $sql = "ALTER TABLE users DROP COLUMN email";

   $pdo -> exec(statement: $sql);

   echo "Column droped succesfullty";
}else(PDOException $e){
    echo $e->getMessage();
}
?>