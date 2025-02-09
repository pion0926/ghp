<?php

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri.= $_SERVER['HTTP_HOST'];

// Modified to redirect to index.html
header('Location: '. $uri. '/index.html'); 
exit;?>