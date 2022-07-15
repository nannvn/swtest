<?php
require('src/data_driver.php');

function loadApp() {
    
    $vars = [];
    getComments($vars);    
    return $vars;
}

function getComments(&$vars) {
    
    $vars['comments'] = [];   
    $comments = DataDriver::getComments();

    foreach (['candy', 'refer', 'signature'] as $key) {
        $html = ''; 
        foreach ($comments[$key] as $row) {
            $html .= '<div class="comment-row">' . $row['comments'] . '</div>';
        }
        $vars['comments'][$key] = $html;
    }
}

