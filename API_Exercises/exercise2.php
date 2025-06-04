<?php 

// Assign response (in JSON format) to variable from an API call.
$response = file_get_contents('https://randomuser.me/api');

// Decodes the JSON response to a PHP object (stdClass) utilizing json_decode function (default behavior)
$data = json_decode($response);
var_dump($data->results[0]->gender);
echo "\n";

// Other option is to turn the JSON response to an associative array for easier data retrievable
$data2 = json_decode($response, true);
var_dump($data2['results'][0]['gender']);

?>