<?php
/* Utilized in this project: 
* -- Composer
* -- Stripe PHP SDK/library: (require stripe/stripe-php)
*
*  Example of using Stripe's SDK. This makes API calls in an OOP style, like Guzzle, but
*  specifically to Stripe's API. This exercise accesses the customers resource similarly to 
*  exercise13.php in my API-Exercises directory. 
*
*  To be specific, this uses the StripeClient object and its customers property and the create 
*  method to create a new customer. The purpose is to demonstrate the simplicity and conciseness 
*  of using SDK over cURL whenever the vendor provides it.
*  Stripe SDK documentation found here: https://docs.stripe.com/api/customers/create?lang=php
*/

// require Composer's autoloader to utilize various package classes from Stripe's SDK
require __DIR__ . '/vendor/autoload.php';

$api_key = '<YOUR_API-KEY>';

// Customer data to be sent
$requestPayload = [
    'name' => 'sdk',
    'email' => 'sdk@example.com',
    'description' => 'This customer was created using Stripe\'s sdk'
];

// Instantiate the StripeClient object (api connection) to access Stripe's various properties and methods.
$stripe = new \Stripe\StripeClient($api_key);

// Utilizes the instance of the StripeClient object to access the customers property and execute 
// the create method along with the data of the new customer passed as an argument. 
// As a result, an object (JSON) is returned representing the new customer.
$customer = $stripe->customers->create($requestPayload);

echo $customer;
?>