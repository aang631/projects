<?php
if(!empty($_GET["action"])){
	$action=$_GET["action"];
}else{
	$action="home";
}

switch($action){
	case "home":
		require "views/home.php";
		die();
	case "adminLogin":
		require "models/adminLoginModel.php";
		require "views/adminLogin.php";
		die();
	case "adminLogout":
		require "models/adminLogoutModel.php";
		die();	
	case "addSeforim":
		require_once "models/adminModeRequiredModel.php";
		require "models/addSeforimModel.php";
		require "views/addSeforim.php";
		die();
    case "getSeforimInfo":
		require "models/getSeforimInfoModel.php";
		require "views/getSeforimInfo.php";
		die();
	case "searchCatalog":
		require "models/searchCatalogModel.php";
		require "views/searchCatalog.php";
		die();
	case "updateSefer":
		require_once "models/adminModeRequiredModel.php";
		require "models/updateSeferModel.php";
		require "views/updateSefer.php";
		die();	
	default:
	$errors['action']="$action is an invalid action";
	require "views/error.php";
	die();		
		
}
?>