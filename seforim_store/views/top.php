<?php require_once "models/adminLogoutModel.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php if(!empty($title)) echo $title; ?></title>
		<link rel="stylesheet" href="/bootstrap-3.3.6/css/bootstrap.min.css">
	      <style>
		  header{
			  position: top 0;
			  background-image: url("images/seforim_sale.png");
			  height: 120px;
		   }
		  body{
			  background-image: url("images/seforim.jpg");
		  }
		  html, body 
		  		{ 
					height: 100%;
		    }
			#adminSigninDiv{
			background-color: black;
    		border: 3px solid #e3e3e3;
    		border-radius: 4px;
			position: fixed;
   			top: 5px;
    		left: -13px;
    		width: 210px;
    		padding: 15px;
		}	
		  <?php if(!empty($style)) echo $style; ?>
		  </style>
	</head>
    <body>
	<header>
	<?php 
	if ($action!=='adminLogin'){
		if(isset($_COOKIE['adminConfirmed'])&&($_COOKIE['adminConfirmed']=="Authorized User")){
			echo "<div class='container text-center' id='adminSigninDiv'>
						<form method='GET'> 
						 	<input type='hidden' name='action' value=$action>
							<input type='hidden' name='adminLogout' value='true'/>
            				<input type='submit' class='btn btn-sm btn-danger' value='Sign out of Administrator Mode'>  
        				</form>
				  </div>";
		}
		else { 
		echo "<div class='container text-center' id='adminSigninDiv'>
						<form method='GET'> 
						    <input type='hidden' name='action' value='adminLogin'>
						 	<input type='hidden' name='referrer' value=$action>
							<input type='submit' class='btn btn-sm btn-success' value='Sign in as Administator'>  
        				</form>
				  </div>";
		}
	}
	?>
    </header>
	<div class="container text-center well">	


		