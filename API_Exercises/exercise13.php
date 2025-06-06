<?php
/* Example of using Stripe's RESTful API. This makes an API request, using cURL,
*  to the customers resource. To be specific, this uses the POST request method, 
*  as a result of the call, it creates a new customer object with the specified 
*  data in the request payload. Different encoding format was used and a different
*  authorization method was used as well.
*  API documentation for customers could be found here: https://docs.stripe.com/api/customers/create?lang=curl
*/

// This API also allows the key to be passed using HTTP basic authentication (CURLOPT_USERPWD)
$api_key = '<YOUR_API-KEY>';

// However, one could also send the authentication through a request header
/*  $requestHeader = [
*       'Authorization: Bearer <YOUR_API-KEY>'
*   ];
*/

$curlHandle = curl_init();

// Stripe API requires data passed through the request to be formatted as a URL-encoded query string 
// (utilized http_build_query()) instead of encoding it to JSON
$requestPayload = http_build_query([
    'name' => 'John Doe',
    'email' => 'johnDoe@example.com',
    'description' => 'Testing the API customer resource test'
]);

// CURLOPT_POSTFIELDS sets the request to POST automatically
curl_setopt_array($curlHandle, [
    CURLOPT_URL => 'https://api.stripe.com/v1/customers',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_USERPWD => $api_key,
    // Other option if one wants to send authentication through the header: CURLOPT_HTTPHEADER => $requestHeader,
    CURLOPT_POSTFIELDS => $requestPayload
]);


$response = curl_exec($curlHandle);
$statusCode = curl_getinfo($curlHandle, CURLINFO_RESPONSE_CODE);
curl_close($curlHandle);

// Turns it into an associative array
$data = json_decode($response, true);

// status code of 200 means it was a successful api request
echo $statusCode, "\n\n";
print_r($data);
?>