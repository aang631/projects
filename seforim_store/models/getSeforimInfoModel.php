<?php
require "utils/db.php";

$seforimQuery='SELECT * FROM seforim';
$results=$db->query($seforimQuery);
$seforim=$results->fetch();

if(isset($_GET['seferID'])){
	$seferID=$_GET['seferID'];
}else{
	$seferID=null;
}
try{
	$seferInfoQuery="SELECT * FROM seforim WHERE id = :seferID";
	$preparedSeferQuery= $db->prepare($seferInfoQuery);
	$preparedSeferQuery->bindValue(':seferID',$seferID);
	$preparedSeferQuery->execute();
	$seferDetails=$preparedSeferQuery->fetch();
} catch(PDOException $e){
	echo $e->getMessage();
	require "views/error.php";
	exit(); 
}
?>