<?php
// ********** Example of using a request header with an api request (specifically in a cURL transfer) **********
$curlHandle = curl_init();

// Always check the API documentation for the desired endpoint and required format
$headers = [
    "Authorization: Client-ID {YOUR_ACCESS_KEY}"
];

// making a request to the unsplash site for a random picture
curl_setopt_array($curlHandle, [
    CURLOPT_URL => 'https://api.unsplash.com/photos/random',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers
]);

$response = curl_exec($curlHandle);
$statusCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);
curl_close($curlHandle);

echo $statusCode, "\n";
echo $response, "\n\n";

?>