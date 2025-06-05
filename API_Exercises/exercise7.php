<?php
// ******* Example of retrieving a response header by including the appropriate cURL option int the api request *******
$curlHandle = curl_init();

// Always check the API documentation for the desired endpoint and required format
$headers = [
    "Authorization: Client-ID {YOUR_ACCESS_KEY}"
];

// making a request to the unsplash site for a random picture
curl_setopt_array($curlHandle, [
    CURLOPT_URL => 'https://api.unsplash.com/photos/random',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_HEADER => true
]);

// The full response header is outputted before the payload (before the body of the response)
// when the option CURLOPT_HEADER is set to true. 
$response = curl_exec($curlHandle);
$statusCode = curl_getinfo($curlHandle, CURLINFO_HTTP_CODE);

// Individual response header values could also be retrieved with the curl_getinfo function
$responseType = curl_getinfo($curlHandle, CURLINFO_CONTENT_TYPE);
$responseLength = curl_getinfo($curlHandle, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

curl_close($curlHandle);

echo $statusCode, "\n";
echo $responseType, "\n";
echo $responseLength, "\n";
echo $response, "\n\n";

?>