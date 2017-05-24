<?php 
$style=' label{
			  padding-left:10px;
			  
		  }
		  .errorMessage{
			  color:red;
			  font-size:30px;
		  }';
include "views/top.php" ;
?>
	    <?php if($seforimAdded===false): ?>	
				    <form class="form-horizontal">
						 <div class="form-group">
							 <h2>Welcome to the administrators site of our seforim store.</h2>
							 <h3>To add seforim to our library please complete the information below</h3>
							 <?php foreach($errors as $error){
								 echo"<span class=\"errorMessage\"> $error </span><br/>";
							 } ?>
							 <input type="hidden" name="action" value="<?=$action?>" />
							 <label> Name: <input type="text" name="name" id="name" value="<?="$name"?>" required/></label>
							 <label> Price: <input type="number" name="price" id="price" min="0" step=".01" value="<?="$price"?>"required/></label>
							 <label>Type:<select name="type">
									 <?php foreach ($types as $type): ?>
									 <option><?=$type?></option>
									 <?php endforeach; ?></label>
							 </select>
							 <input class="btn btn-sm btn-success" type="submit"/>
						 </div>
                    </form>
			      <br>
             <?php else: ?> 
		        <div class="alert alert-success text-center col-sm-8 col-sm-offset-2">
		           <h3>Successfully added <?=$name?> to our Library!</h3>
				    <a class="btn btn-sm btn-info" href="index.php?action=searchCatalog">Back to Catalog</a> 
				</div>   
		  <?php endif ?>
    </div>		  
<?php include "views/bottom.php" ;
?>