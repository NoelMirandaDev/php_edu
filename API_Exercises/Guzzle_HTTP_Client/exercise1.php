<?php 
/* Utilized in this project: 
* -- Composer: uses namespaces to find and load classes automatically
* -- Guzzle (and its dependencies): Another alternative to accessing APIs using PHP which uses 
*    request and response objects along with clearly named methods.
* -- Guzzle Documentation located at: https://docs.guzzlephp.org/en/stable/overview.html
* -- GitHub Repo API Documentation located at: https://docs.github.com/en/rest/repos/repos?apiVersion=2022-11-28
*/

// require Composer's autoloader to utilize various package classes
require __DIR__ . "/vendor/autoload.php";

// Create a Guzzle Client object, which is in the GuzzleHttp namespace
$client = new GuzzleHttp\Client();

// Make a request to the GitHub API using the client object request method and passing the
// request method type, endpoint url, and optional request headers/options.
$response = $client->request('GET', 'https://api.github.com/user/repos', [
    'headers' => [
        'Authorization' => 'Bearer <YOUR-TOKEN>',
        'User-Agent' => 'NoelMirandaDev'
    ]
]);

// Response object also has its methods to access extra details about the response
echo $response->getStatusCode(), "\n\n"; // returns the status code

// returns an array of the values of the headers named as the parameter passed to the method
echo $response->getHeader('content-type')[0], "\n\n"; 

// returns a long string of JSON for the response body
echo substr($response->getBody(), 0, 200), "...\n\n";
?>