<?php
require "utils/db.php";

$errors=[];
$submitted= isset($_POST['user']) || isset($_POST['password']);
if (!empty(($_GET['referrer']))){
    $referrer = ($_GET['referrer']);
    }
    else{
    $referrer='';
    }
 

if ($submitted){
    if (empty($_POST['user'])) {
        $errors[]="User name is required";
    }
    else if((strlen($_POST['user']))<5){
        $errors[]="User name must be at least 5 charachters long";
    }
    else if((strlen($_POST['password']))>30){
        $errors[]="User name cannot exceed 30 charachters";
    }
    else {
        $user = $_POST['user'];
    }

   if (empty($_POST['password'])) {
        $errors[]="Password is required";
    } 
    else if((strlen($_POST['password']))<8){
        $errors[]="Password must be at least 8 charachters long";
    }
    else if((strlen($_POST['password']))>25){
        $errors[]="Password cannot exceed 25 charachters";
    }
    else {
        $password = $_POST['password'];
    }
}
if ($submitted){
    try {
        $query = 'SELECT hash FROM administrator WHERE user_name = :user';
        $statement = $db->prepare($query);
        $statement->bindValue(':user', $user);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        } 
        catch(DBOException $e) {
        echo "Error. Please try again";
    }

    if(password_verify($password, $result['hash'])) {
        setCookie('adminConfirmed', "Authorized User", 0);
        header("Location: ./index.php?action=" . $referrer);
    }
    else{
    $errors[]= "Username and Password do not match. Please try again";
    }
}
