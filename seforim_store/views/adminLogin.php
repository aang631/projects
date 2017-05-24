<?php
include "views/top.php" ;
?>
  
            <form method="post"> 
                <div class="form-inline">
                    <div class="form-group">
                        <label>Administator Login</label>
                        <br>
                        <input type="text" placeholder="user name" name="user" minlength="5" maxlength="30" required/>
                        <input type="password" placeholder="password" name="password" minlength="8" maxlength="25" required/>
                        <input type="submit" class="btn btn-sm btn-danger" value="Login">
                    <?php 
                    if(isset($errors)){
                        foreach($errors as $error){
                            echo "<div class='error text-center'>$error</div>";
                        }
                    }
                    ?> 
                    <div><br/><a href="index.php" class="btn btn-sm btn-primary">Home Page</a></div>
                  </div>  
              </div>      
        </form>
    </div>
