<?php
/* Example of using a different api endpoint, from GitHub's API, that creates a repository.
*  In this example we are adding a request body/payload to the api request to set certain details
*  of the repository such as the repository name, description, etc.
*  API documentation for repo could be found here: https://docs.github.com/en/rest/repos/repos?apiVersion=2022-11-28
*/

$curlHandle = curl_init();

$headers = [
    "Authorization: Bearer <YOUR-TOKEN>",
    // 'User-Agent: NoelMirandaDev'
];

// In this instance, we have to send the body/payload as an associative array that is encoded in json format. 
// The key names for the body can be found in the api documentation.
$requestPayload = json_encode([
    'name' => 'Created from API',
    'description' => 'An example API-created repo',
    'auto_init' => true
]);

/* CURLOPT_CUSTOMREQUEST and CURLOPT_POST are two different options that could be utilized to make this api request method POST.
*  However, since CURLOPT_POSTFIELDS was utilized, this automatically makes the method POST. Utilizing the other options are
*  still acceptable if one wants to be explicit.
*/
curl_setopt_array($curlHandle, [
    CURLOPT_URL => 'https://api.github.com/user/repos',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_USERAGENT => 'NoelMirandaDev',
    // CURLOPT_CUSTOMREQUEST => 'POST',
    // CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $requestPayload
]);


$response = curl_exec($curlHandle);
$statusCode = curl_getinfo($curlHandle, CURLINFO_RESPONSE_CODE);

curl_close($curlHandle);

// Status code of 201 means the API request was successful.
// Status code 422 means repository creation failed. 
echo $statusCode, "\n";
echo $response, "\n\n";
?>