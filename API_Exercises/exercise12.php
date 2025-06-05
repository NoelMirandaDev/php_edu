<?php
/* Example of using a different api endpoint, from GitHub's API. This makes an API request
*  anonymously (I did not authenticate myself), which then returns all public gists. This demonstrates accessing a RESTful API
*  in PHP with cURL. To be specific, this uses the GET request method and accesses the resource as 
*  a whole (all the gists) with code that is commented, and then I access the resource more specifically by adding the id to the
*  endpoint url.
*  API documentation for repo could be found here: https://docs.github.com/en/rest/gists/gists?apiVersion=2022-11-28
*/

$curlHandle = curl_init();

curl_setopt_array($curlHandle, [
    // CURLOPT_URL => 'https://api.github.com/gists' ***(This is the endpoint url for the whole resource list)***,
    CURLOPT_URL => 'https://api.github.com/gists/fc56e139914c463c3b613bc1d990efeb', // Specific gist in the resource gists
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_USERAGENT => 'NoelMirandaDev'
]);


$response = curl_exec($curlHandle);
$statusCode = curl_getinfo($curlHandle, CURLINFO_RESPONSE_CODE);
curl_close($curlHandle);

// Turns it into an associative array
$data = json_decode($response, true);

echo $statusCode, "\n\n";
print_r($data);

/***** This code is utilized when fetching (GET) the list of gist from the gists resource without a specific identifier *****
* 
*      foreach ($data as $gist) {
*         echo $gist['id'], ' - ', $gist['description'], "\n\n";
*      }
*/
?>