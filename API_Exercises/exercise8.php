<?php
// ******* Example of retrieving all the response headers in an array by setting the CURLOPT_HEADERFUNCTION int the api request *******
$curlHandle = curl_init();

// Always check the API documentation for the desired endpoint and required format
$headers = [
    "Authorization: Client-ID {YOUR_ACCESS_KEY}"
];

// array to hold response headers
$responseHeaders = [];

// callback function to be included with the CURLOPT_HEADERFUNCTION setting (must return header length)
$headerCallback = function ($curlHandle, $header) use (&$responseHeaders) {
    $len = strlen($header);

    $separatedHeader = explode(':', $header, 2);

    if (count($separatedHeader) < 2) {
        return $len;
    }
    // Turns the array to an associative array and it modifies the actual reference of the array because of the "&" character in the function
    $responseHeaders[$separatedHeader[0]] = trim($separatedHeader[1]);

    return $len;
};


curl_setopt_array($curlHandle, [
    CURLOPT_URL => 'https://api.unsplash.com/photos/random',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_HEADERFUNCTION => $headerCallback
]);


$response = curl_exec($curlHandle);
$statusCode = curl_getinfo($curlHandle, CURLINFO_RESPONSE_CODE);

curl_close($curlHandle);

echo $statusCode, "\n";
print_r($responseHeaders); 
echo "\n";
echo $response, "\n\n";
?>