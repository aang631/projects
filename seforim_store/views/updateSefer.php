<?php 
$style=' label{
			  padding-left:10px;
	    }
         li{
			  text-transform:capitalize;
			  list-style:none;
		  }
		  th{
			  text-align:center;
			  text-transform:capitalize;
              }
          .divider{
              border-top:solid 3px gray;
          }    
		  ';
include "views/top.php" ;
?>
	    <?php if($seforimUpdated===false): ?>
				    <form class="form-horizontal">
						 <div class="form-group">
							 <h2>Welcome to the administrators site of our seforim store.</h2>
							 <h3>To update seforim to our library please complete the information below</h3>
                        <div class="divider">
							 <h3>You are about to make changes to the following entry</h3>
                             <?php foreach($errors as $error){
								 echo"<span class=\"errorMessage\"> $error </span><br/>";
							 } ?>
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
                              </div>
                              <div class="divider">
                              <br>
                             <input type="hidden" name="action" value="<?=$action?>" />
                             <input type="hidden" name="seferID" value="<?=$seferID?>">
							 <label>Updated Name: <input type="text" name="updatedName" id="updatedName" required/></label>
							 <label>Updated Price: <input type="number" name="updatedPrice" id="updatedPrice" min="0" step=".01" required/></label>
							 <label>Updated Type:<select name="updatedType">
									 <?php foreach ($types as $type): ?>
									 <option><?=$type?></option>
									 <?php endforeach; ?> </select></label>
							
                             <label> In Stock:
                             <select name=updatedInStock>
                             <option value="Y">Yes</option>
                             <option value="N">No</option>
                             <select>
                             </label>
							 <input class="btn btn-sm btn-success" type="submit"/>
						 </div>
                    </form>
			      <br>
                 </div> 
             <?php else: ?> 
		        <div class="alert alert-success text-center col-sm-8 col-sm-offset-2">
		           <h3>Successfully updated <?=$updatedName?> in our Library!</h3>
                   <a class="btn btn-sm btn-info" href="index.php?action=searchCatalog">Back to Catalog</a> 
				</div>   
		  <?php endif ?>
    </div>		  
<?php include "views/bottom.php" ;
?>