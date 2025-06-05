<?php
// ******* Example of using GitHub's API to verify if a repository is starred by the authenticated user *******

$curlHandle = curl_init();

/* Always check the API documentation for the desired endpoint and required format.
   API documentation could be found here: https://docs.github.com/en/rest/activity/starring?apiVersion=2022-11-28
*/

// User-agent (my account) could either be sent through the request header or in the cURL options array
$headers = [
    "Authorization: Bearer <YOUR-TOKEN>",
    // 'User-Agent: NoelMirandaDev'
];

// I am checking if I (NoelMirandaDev) starred the repository cli by httpie
curl_setopt_array($curlHandle, [
    CURLOPT_URL => 'https://api.github.com/user/starred/httpie/cli',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_USERAGENT => 'NoelMirandaDev'
]);


$response = curl_exec($curlHandle);
$statusCode = curl_getinfo($curlHandle, CURLINFO_RESPONSE_CODE);

curl_close($curlHandle);

// Status code of 204 means it is starred and 404 if repository is not starred. 401 means authentication is required.
echo $statusCode, "\n";
echo $response, "\n\n";
?>