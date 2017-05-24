<?php
if((!isset($_COOKIE['adminConfirmed']))||($_COOKIE['adminConfirmed']!=="Authorized User")){
        header("Location: index.php");
        exit();
    }
?>

