<?php
$searchNumber=0;
$style=' li{
			  text-transform:capitalize;
			  list-style:none;
		  }
		  th{
			  text-align:center;
			  text-transform:capitalize;
		  }
		  .filter{
			  position:fixed; 
              z-index:1;
			  bottom:-20px;			  
		  }
		tbody tr td:last-child{
		color: none;
		border:none;
		background-color: none;
		border-color: none;
		}

		  ';
		
include "views/top.php" ;
if($requestConfirmation!=='Y'&&$confirmation!=="Y"){ 
include "views/filter.php";
}
?>
	<div class="container">
		<div class="row">
		  <?php if($requestConfirmation!=='Y'&&$confirmation!=="Y"): ?>
			<div class="col-xs-offset-3 col-xs-8">
				<table class="table table-bordered table-striped table-hover table-condensed">
						<?php if(empty($search)):?>
	                     <?php echo "<h1>Sorry. No matches found</h1>";
						 else :?> 
					<thead>
					<tr>
					<th class="danger">Sefer Name</th>
					<th class="danger">Type</th>
					<th class="danger">Price</th>
					<th class="danger">In Stock</th>
					<th class="danger">Sefer ID</th>
					</tr>
					</thead>
				    <tbody>						  
				       <ul>
					   <?php            
						 foreach($search as $result) : ?>
						   <tr <?php if ($searchNumber%2==0)
							   { echo 'class="info"'; 
							   }
								 else {
								 echo 'class="success"'; 
								 } ?> 
							>
							<td><?= $result['name']; ?></td>
							<td><?= $result['type']; ?></td>
							<td>$<?= number_format($result['price'], 2); ?></td>
							<td><?= $result['in_stock']; ?></td>
							<td><?= $result['id']; ?></td>
							<?php 
							if((isset($_COOKIE['adminConfirmed']))&&($_COOKIE['adminConfirmed']=="Authorized User")): ?>
							<form>
								<td>
									<input type="hidden" name="action" value="<?=$action?>" /> 
									<input type="hidden" name="requestConfirmation" value="Y" />
									<input type="hidden" name="seferName" value="<?= $result['name']; ?>" />
									<input type="hidden" name="seferID" value="<?= $result['id']; ?>" />
									<input type=submit value="Delete" class="btn btn-sm btn-danger">
								</td>
							</form>
								<form>
								<td>
									<input type="hidden" name="action" value="updateSefer" /> 
									<input type="hidden" name="seferName" value="<?= $result['name']; ?>" />
									<input type="hidden" name="seferType" value="<?= $result['type']; ?>" />
									<input type="hidden" name="seferPrice" value="<?= $result['price']; ?>" />
									<input type="hidden" name="inStock" value="<?= $result['in_stock']; ?>" />
									<input type="hidden" name="seferID" value="<?= $result['id']; ?>" />
									<input type=submit value="Update" class="btn btn-sm btn-warning">
								</td>
							</form>
							<?php endif; ?>
							<?php $searchNumber++?>
						  </tr>
						<?php endforeach; 
					 endif;?>
						</ul>
				</tbody>
				</table>
			
				<a href="index.php?action=getSeforimInfo" class="btn btn-sm btn-info">Get Sefer Info</a>
				<?php 
					if((isset($_COOKIE['adminConfirmed']))&&($_COOKIE['adminConfirmed']=="Authorized User")):?>
					<a href="index.php?action=addSeforim" class="btn btn-sm btn-primary">Add Seforim</a>
					<?php endif ?>
				</div>
				<?php 
					elseif($requestConfirmation==='Y'&&$confirmation!=='Y'):?>
					<div class="jumbotron alert alert-danger text-center col-sm-8 col-sm-offset-2">
					<form>
					
					<h2>Are you sure you want to delete <?= $seferName ?> from the library?</h2>
					<input type="hidden" name="action" value="<?=$action?>" /> 
					<input type="hidden" name="seferName" value="<?=$seferName?>" />
             	    <input type="hidden" name="seferID" value="<?= $seferID ?>" />
					<input type="hidden" name="confirmation" value="Y"/>
					<input type=submit value="Confirm!" class="btn btn-sm btn-danger">
					</form>
					</div>
					<?php endif ?>
					<?php 
				    if($seforimDeleted===true){
					?>
                   <div class="alert alert-success text-center col-sm-8 col-sm-offset-2">
		           <h3>Successfully deleted <?=$seferName?> from our Library!</h3>
				    <a class="btn btn-sm btn-info" href="index.php?action=searchCatalog">Back to Catalog</a> 
				   </div>   	
					  <?php } ?>
			</div>
		</div>
   </div>
<?php include "views/bottom.php"; ?>