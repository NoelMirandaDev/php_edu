<?php 

// Decoding a response (In JSON) from an API call.
$response = file_get_contents('https://randomuser.me/api');

// Turning the JSON response to a PHP object (stdClass) utilizing json_decode function (default behavior)
$data = json_decode($response);
var_dump($data->results[0]->gender);
echo "\n";

// Other option is to turn the response to an associative array for easier data retrievable
$data2 = json_decode($response, true);
var_dump($data2['results'][0]['gender']);

?>