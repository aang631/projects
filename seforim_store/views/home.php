<?php
include "views/top.php";
?>
		<h3>Welcome to our Seforim Store Home Page </h3>
		<a href="index.php?action=searchCatalog" class="btn btn-sm btn-info">Browse our Catalog</a>
		<a href="index.php?action=getSeforimInfo" class="btn btn-sm btn-danger">Get Sefer Info</a>
		<?php 
			if((isset($_COOKIE['adminConfirmed']))&&($_COOKIE['adminConfirmed']=="Authorized User")):?>
				<a href="index.php?action=addSeforim" class="btn btn-sm btn-success">Add Seforim</a>
			<?php endif ?>
<?php
include "views/bottom.php";
?>