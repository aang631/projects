<?php
$cs='mysql:host=localhost;dbname=seforim_sale';
$user='?????????????';
$password='????????????';

try{
$errorCode = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$db=new PDO($cs, $user, $password, $errorCode);
}catch(PDOException $e){
require "views/error.php";
die($e->getMessage());
} 
?>