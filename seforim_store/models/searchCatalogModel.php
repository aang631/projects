<?php
require "utils/db.php";

if(!empty($_GET['name'])){
	$name=$_GET['name'];
}else
	$name='';
if(!empty($_GET['min'])){
	$min=$_GET['min'];
}else
	$min='';
if(!empty($_GET['max'])){
	$max=$_GET['max'];
}else
	$max='';
if(!empty($_GET['type'])&&(($_GET['type'])!="All")){
	$type=$_GET['type'];
}else
	$type='';
if(!empty($_GET['inStock'])){
	$inStock=$_GET['inStock'];
}else
	$inStock='';

try{
$seforimQuery="SELECT * FROM seforim 
WHERE (:name='' OR name=:name) 
AND (:min='' OR price>=:min) 
AND (:max='' OR price<=:max) 
AND (:type='' OR type=:type) 
AND (:inStock='' OR in_stock=:inStock)";
$results=$db->prepare($seforimQuery);
$results->bindValue(':name', $name);
$results->bindValue(':type', $type);
$results->bindValue(':min', $min);
$results->bindValue(':max', $max);
$results->bindValue(':inStock', $inStock);
$results->execute();
$search=$results->fetchAll();
$results->closeCursor();
}
catch(PDOException $e){
	echo $e->getMessage();
	require "views/error.php";
	exit();
}


$seforimDeleted=false;
if(!empty($_GET['requestConfirmation'])){
	$requestConfirmation=$_GET['requestConfirmation'];
}else
	$requestConfirmation='N';

if(!empty($_GET['seferID'])){
	$seferID=$_GET['seferID'];
}else
	$seferID=null;
if(!empty($_GET['seferName'])){
	$seferName=$_GET['seferName'];
}else
	$seferName=null;

if(!empty($_GET['confirmation'])){
	$confirmation=$_GET['confirmation'];
}else
	$confirmation='N';


if($confirmation==='Y')
{
	try{
		$deleteSeforim="DELETE FROM `seforim` WHERE `seforim`.`id` = (:id)";
		$preparedStatement = $db->prepare($deleteSeforim);
		$preparedStatement->bindValue(':id', $seferID);
		$preparedStatement->execute();
		$seforimDeleted=true;
		}catch(DBOException $e){
			$errors["deleteSeforim_exception"]=$e->getMessage();
			require "views/error.php";
			die();
		}
}	

?>