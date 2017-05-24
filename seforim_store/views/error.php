<?php 
include "views/top.php";
?>
<h1>:(</h1>
<?php 
  if(!empty($errors)){
	 foreach($errors as $error){
    	echo "<h4>$error</h4>";
	}
}
?>
<a href="index.php" class="btn btn-info">Back to Home Page</a>
<a href="index.php?action=addSeforim" class="btn btn-warning">Back to Administrators's Site</a>
<a href="index.php?action=getSeforimInfo" class="btn btn-success">Back to Sefer Info Page</a>
<?php 
include "views/bottom.php";
?>