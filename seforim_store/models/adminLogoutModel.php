<?php
    if(!empty($_GET["adminLogout"])){    
        setCookie('adminConfirmed', "You are not an Admin", time()-100);
        Header('Location: '.$_SERVER['HTTP_REFERER']);
    }
?>
