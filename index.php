<?php
require('src/server.php');
$vars = loadApp();
?>
<!DOCTYPE html>
<html>
<body>
    <h1>Comments</h1>  
    <div class="comment-section">
        <h3>Candy</h3>
        <div><?=$vars['comments']['candy']?></div>
    </div>  
    <div class="comment-section">  
        <h3>Call me / Don't call me</h3>
        <div></div>    
    </div>   
    <div class="comment-section"> 
        <h3>Who referred me</h3>
        <div><?=$vars['comments']['refer']?></div>	
    </div>
    <div class="comment-section">
        <h3>Signature requirements upon delivery</h3>
        <div><?=$vars['comments']['signature']?></div>
    </div>
    <div class="comment-section">
        <h3>Miscellaneous comments (everything else)</h3>
        <div></div>
    </div>
</body>

