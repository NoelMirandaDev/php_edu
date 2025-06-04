<?php 

// Simple Example of Scraping a web page.
$content = file_get_contents('https://example.com/');
echo $content;

// Simple example of an API call 
$content2 = file_get_contents('https://randomuser.me/api');
echo $content2;

?>