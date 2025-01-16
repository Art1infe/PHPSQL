
<?php 
$user = 'root';
$password = 'root';
$server = 'localhost';
$dbname = 'mms';

try{
    $conn = new PDO ("mysql:host=$server; dbname=$dbname", $user, $password);

}
catch(PDOexception $e){
    echo "Error :". $e->getMEssage();
}
?>