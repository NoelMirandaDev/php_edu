<?php
// ********** Example of a 200 HTTP code due to successful cURL transfer **********
$curlHandle = curl_init();

curl_setopt_array($curlHandle, [
    CURLOPT_URL => 'https://randomuser.me/api',
    CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($curlHandle);

$statusCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);

curl_close($curlHandle);

echo $statusCode, "\n";
echo $response, "\n\n";

// ********** Example of a 404 HTTP code due to misspelled/notfound url **********
$curlHandle2 = curl_init();

curl_setopt_array($curlHandle2, [
    CURLOPT_URL => 'https://randomuser.me/ap',
    CURLOPT_RETURNTRANSFER => true
]);

$response2 = curl_exec($curlHandle2);

$statusCode2 = curl_getinfo($curlHandle2, CURLINFO_HTTP_CODE);

curl_close($curlHandle2);

echo $statusCode2, "\n";
echo $response2, "\n\n";

// ********** Example of a 401 HTTP code due to Invalid API key (authentication) ********** 
// ********** Also demonstrates how a message of the error is in the body of the response **********
$curlHandle3 = curl_init();

// In order to make this cURL transfer successful one will have to provide a valid api key with the api request
// E.g. "https://api.openweathermap.org/data/2.5/weather?q=Chicago&appid={API_key}"
curl_setopt_array($curlHandle3, [
    CURLOPT_URL => 'https://api.openweathermap.org/data/2.5/weather?q=Chicago',
    CURLOPT_RETURNTRANSFER => true
]);

$response3 = curl_exec($curlHandle3);

$statusCode3 = curl_getinfo($curlHandle3, CURLINFO_HTTP_CODE);

curl_close($curlHandle3);

echo $statusCode3, "\n";
echo $response3, "\n\n";
?>
