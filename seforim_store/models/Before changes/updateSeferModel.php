<?php
require_once "utils/db.php";

/*if (!empty($_GET['seferName'])){
    $seferName=$_GET['seferName'];}
if (!empty ($_GET['seferType'] )){
    $seferType=$_GET['seferType'] ;}
if (!empty($_GET['seferPrice'])){
    $seferPrice=$_GET['seferPrice'] ;}
if (!empty ($_GET['inStock'])){
    $inStock=$_GET['inStock'];}
if (!empty ($_GET['seferID'])){
    $seferID= $_GET['seferID'];} */  

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

	exit(); 
}

$types=["Chumash", "Nach", "Halacha", "Mishnah", "Gemara", "Tefilla", "Mussar", "Other"];
$seforimUpdated=false;
$errors=[];
$isSubmission = isset($_GET['updatedName']) ||
				isset($_GET['updatedPrice']) ||
				isset($_GET['updatedType']);
 if($isSubmission){
	  if (!empty($_GET["updatedName"])){
		$updatedName=$_GET["updatedName"];   
		   if(is_numeric($updatedName)){
			   $errors["updatedName"]="Name of sefer may not be a number";
		   }
			else if(trim($updatedName)==false)
		   {
			$errors["updatedName"]="Name is required";
		   }    
	 }
	  else{
		$errors["updatedName"]="Name of sefer is required";
	  }
		
	  if (!empty ($_GET["updatedPrice"])){
		 $updatedPrice=$_GET["updatedPrice"];
			
			 if(!is_numeric($updatedPrice)){
				 $errors["updatedPrice"]="Please enter a valid price";
			 }
			 else if($updatedPrice<.01){
				 $errors["updatedPrice"]="Please enter a valid price";
			 }
	 }
	  else {
		 $errors["updatedPrice"]="Price is required";
	  }
	 
	  if (!empty ($_GET["updatedType"])){
		$updatedType=$_GET["updatedType"];
		  if (!in_array($updatedType,$types)){
			 $errors["updatedType"]= "$updatedType is not a valid Sefer Type";
		 }  
	  }
	  else {$errors["updatedType"]="Sefer type is required";}

       if (!empty($_GET["updatedInStock"])){
		    $updatedInStock=$_GET["updatedInStock"];
            if($updatedInStock!=="Y"&&$updatedInStock!=="N")
            {
                $errors["updatedInStock"]= "Entry for in stock must be Yes or No";
            }
	  }  
	  else {$errors["updatedInStock"]="Indicating whether this sefer is in stock is required";}

	  if (!empty($errors)){
		$displayError= "You have an error. Please Correct";	
	  }
	  else {
		  $displayError=null;
	  }  
	  
	if (empty($errors)){
		try{
        $updateSeforim="UPDATE `seforim` SET `name`=:updatedName,`type`=:updatedType,`price`=:updatedPrice,`in_stock`=:updatedInStock WHERE id=:id";
		$preparedStatement = $db->prepare($updateSeforim);
		$preparedStatement->bindValue(':updatedName', ($_GET['updatedName']));
		$preparedStatement->bindValue(':updatedType', ($_GET['updatedType']));
		$preparedStatement->bindValue(':updatedPrice', ($_GET['updatedPrice']));
		$preparedStatement->bindValue(':updatedInStock',($_GET['updatedInStock']));
        $preparedStatement->bindValue(':id',($seferID));
		$preparedStatement->execute();
		$seforimUpdated=true;
		}catch(DBOException $e){
			$errors["updateSeforim_exception"]=$e->getMessage();
			require "views/error.php";
			die();
		}			
	}
}
?>