<?php
/* Example of using the same endpoint url, utilized in exercise9.php, from GitHub's API 
*  but with different request methods (PUT & DELETE). As a result, the request performs different behaviors. 
*  The DELETE method removes the star from the specified repository.
*  The PUT method stars the specified repository. 
*  API documentation could be found here: https://docs.github.com/en/rest/activity/starring?apiVersion=2022-11-28
*/

$curlHandle = curl_init();

$headers = [
    "Authorization: Bearer <YOUR-TOKEN>",
    // 'User-Agent: NoelMirandaDev'
];

/* Utilize the CURLOPT_CUSTOMREQUEST option with the desired value to change the request method of the api request.
*  Make sure the Methods are uppercase. This is currently set to PUT so a repository can be starred. One can easily
*  replace the value to be DELETE to remove the star. By default, if not declared explicitly, it is GET.
*/
curl_setopt_array($curlHandle, [
    CURLOPT_URL => 'https://api.github.com/user/starred/httpie/cli',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_USERAGENT => 'NoelMirandaDev',
    CURLOPT_CUSTOMREQUEST => 'PUT'
]);


$response = curl_exec($curlHandle);
$statusCode = curl_getinfo($curlHandle, CURLINFO_RESPONSE_CODE);

curl_close($curlHandle);

// Status code of 204 means the API request was successful.
echo $statusCode, "\n";
echo $response, "\n\n";
?>