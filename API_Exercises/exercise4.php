<?php
/* -------------- Differences between file_get_contents function and cURL --------------

Using file_get_contents is a quick way to make a basic API call in PHP. 
It is easy to use and works well if one only needs to send a simple GET request. 
For example, if one just wants to pull data from a public API without authentication
or special settings, then file_get_contents can do the job. However, it has limited features.
It does not give detailed error messages, and it is harder to add custom headers 
or use other request types like POST or PUT.

cURL gives much more control. With cURL, one can send any type of request, such as GET, POST,
or DELETE. One can also easily set headers, such as an API key or bearer token. It allows to
handle timeouts, follow redirects, and get response codes from the server. This makes cURL a 
better choice when working with secure or complex APIs.

In short, file_get_contents is best for simple and quick API calls while cURL is best when one
needs more flexibility, better error handling, or needs to send more than just a basic GET request.

------------------------------------------------------------------------------------------
*/

// ************************************ HOW TO USE cURL ************************************

// First step, one initializes the cURL session (variable holding the session is commonly called the handle)
$curlHandle = curl_init();

/* ********** Second step, Option 1 **********
// Set options for the cURL transfer individually.

    // Set the url to fetch (by default, cURL makes a GET request)
    curl_setopt($curlHandle, CURLOPT_URL, 'https://randomuser.me/api');

    // Opting to return the response as a string instead of outputting it directly
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
*/

// ********** Second step, Option 2 **********
// Set options for the cURL transfer in an array.
    curl_setopt_array($curlHandle, [
        CURLOPT_URL => 'https://randomuser.me/api',
        CURLOPT_RETURNTRANSFER => true
    ]);

// Step 3, execute the cURL request and store the response (this overall process is called a transfer)
$response = curl_exec($curlHandle);

// Closes cURL session and free up system resources
curl_close($curlHandle);

echo $response;
?>
