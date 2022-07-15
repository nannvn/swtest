<?php
require('src/server.php');
$vars = loadApp();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="static/styles.css">
</head>
<body>
    <div class="comments">
        <h1>Customer comments</h1>  
        <div class="comments-section">
            <h3>Candy</h3>
            <div><?=$vars['comments']['candy']?></div>
        </div>  
        <div class="comments-section">  
            <h3>Call me / Don't call me</h3>
            <div></div>    
        </div>   
        <div class="comments-section"> 
            <h3>Who referred me</h3>
            <div><?=$vars['comments']['refer']?></div>	
        </div>
        <div class="comments-section">
            <h3>Signature requirements upon delivery</h3>
            <div><?=$vars['comments']['signature']?></div>
        </div>
        <div class="comments-section">
            <h3>Miscellaneous comments (everything else)</h3>
            <div></div>
        </div>
    </div>
</body>

