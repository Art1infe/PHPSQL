<?php 

try{
    $pdo = new PDO("mysql:host=localhost; dbaname=new_db", username: "root", password: "");

    $sql = "DROP TABLE users";
 
    $pdo -> exec(statement: $sql);
 
    echo "Table dropped succesfully ";
}catch(PDOException $e){
    echo $e->getMessage();
}
   
?>