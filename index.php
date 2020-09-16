<?php
require 'httpRequest.php';
$request = new httpRequest;

// $request->requestArray[CURLOPT_USERAGENT] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36'; // set new curl options

// $request->requestHeaders['accept-encoding'] = 'gzip, deflate, br';


$apiKey = '724dcd02791a41529148954bca4524fb'; /// use your apiKey and replace XXXX string

/// example of a POST api request

// $request->requestHeaders = [
//     'Accept' => 'text/html',
//     'Content-Type' => 'application/x-www-form-urlencoded'
// ];

// $request->queriesArray = [
//     'apiKey' => $apiKey
// ];

// $response = $request->request(
//     "https://api.spoonacular.com/recipes/visualizeIngredients?apiKey=" . $apiKey, 
//     "POST", 
//     [
//         'spoonacularApiKey' => $apiKey, 
//         'servings' => 2,
//         'measure' => 'metric',
//         'viewStyle' => 'grid'
//     ]); // example request food api


/// example of a GET api request

// $request->requestHeaders = [
//     'Content-Type' => 'application/json'
// ];

// $request->queriesArray = [
//     'apiKey' => $apiKey
// ];

// $response = $request->request(
//     "https://api.spoonacular.com/recipes/4632/summary", 
//     "GET"
// ); // GET example

/// example of a simple GET request

$response = $request->request("http://www.google.com");

echo $response;

// var_dump( $response );
?>