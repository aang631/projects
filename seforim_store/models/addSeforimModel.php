<?php
require "utils/db.php";

$name=null;
$price=null;
$type=null;

$types=["Chumash", "Nach", "Halacha", "Mishnah", "Gemara", "Tefilla", "Mussar", "Other"];
$seforimAdded=false;
$errors=[];
$isSubmission = isset($_GET['name']) ||
				isset($_GET['price']) ||
				isset($_GET['type']);
 if($isSubmission){
	  if (!empty($_GET["name"])){
		$name=$_GET["name"];   
		   if(is_numeric($name)){
			   $errors["name"]="Name of sefer may not be a number";
		   }
			else if(trim($name)==false)
		   {
			$errors["name"]="Name is required";
		   }    
	 }
	  else{
		$errors["name"]="Name of sefer is required";
	  }
		
	  if (!empty ($_GET["price"])){
		 $price=$_GET["price"];
			
			 if(!is_numeric($price)){
				 $errors["price"]="Please enter a valid price";
			 }
			 else if($price<.01){
				 $errors["price"]="Please enter a valid price";
			 }
	 }
	  else {
		 $errors["age"]="Price is required";
	  }
	 
	  if (!empty ($_GET["type"])){
		$type=$_GET["type"];
		  if (!in_array($type,$types)){
			 $errors["type"]= "$type is not a valid Sefer Type";
		 }  
	  }
	  else {$errors["type"]="Sefer type is required";}
		
	  if (!empty($errors)){
		$displayError= "You have an error. Please Correct";	
	  }
	  else {
		  $displayError=null;
	  }  
	  
	if (empty($errors)){
		try{
		$addSeforim="INSERT INTO seforim (name, type, price, in_stock) VALUES (:name, :type, :price, :in_stock)";
		$preparedStatement = $db->prepare($addSeforim);
		$preparedStatement->bindValue(':name', ($_GET['name']));
		$preparedStatement->bindValue(':type', ($_GET['type']));
		$preparedStatement->bindValue(':price', ($_GET['price']));
		$preparedStatement->bindValue(':in_stock', "Y");
		$preparedStatement->execute();
		$seforimAdded=true;
		}catch(DBOException $e){
			$errors["addSeforim_exception"]=$e->getMessage();
			require "views/error.php";
			die();
		}			
	}
}
?>