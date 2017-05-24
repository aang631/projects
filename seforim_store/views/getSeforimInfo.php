<?php
$style=' li{
			  text-transform:capitalize;
			  list-style:none;
		  }
		  th{
			  text-align:center;
			  text-transform:capitalize;
		  }';
include "views/top.php" ;
?>
			      <form class="form-horizontal">
	                 <div class="form-group">
					  <input type="hidden" name="action" value="<?=$action?>" />
					 <?php if (empty($seferID)):?>
					 <h2>Pick a sefer from our catalog to see seforim details</h2>
					 <select name="seferID">
					   <ul>	 
					     <?php
                         while($seforim){
						 echo "<li><option value=\"{$seforim['id']}\"> {$seforim['name']} </option></li>";
						 $seforim=$results->fetch();
						 }
						 ?>
					    </ul>	 
					  </select>
					     <input class="btn btn-sm btn-info" value="Get Details" type="submit"/>
						<?php 
							if((isset($_COOKIE['adminConfirmed']))&&($_COOKIE['adminConfirmed']=="Authorized User")):?>
							<a href="index.php?action=addSeforim" class="btn btn-sm btn-danger">Add Seforim</a>
						<?php 
							endif ?> 
						 <a href="index.php?action=searchCatalog" class="btn btn-sm btn-success">Browse our Catalog</a>
					<?php else: ?>
						   <div class="container">
						     <table class="table table-bordered table-striped table-hover table-condensed">
						        <thead>
						          <tr>
						           <?php foreach($seferDetails as $key => $value){
						            if(!is_Numeric($key)){echo "<th class='danger'>$key</th>";}
						            }?>
								  </tr>
						        </thead>
                                <tbody>	
                                <tr>						  
						    <?php foreach($seferDetails as $key => $value){
						            if(!is_Numeric($key)){echo "<td class='info'>$value</td>";}
						         }?>
						        </tr>
						       </tbody>
						   </table>
						</div>
						   <a href="index.php?action=getSeforimInfo"><?php $seferID=null;?> Back to our catalog</a>
				  <?php endif; ?>
               </form>
<?php include "views/bottom.php"; ?>