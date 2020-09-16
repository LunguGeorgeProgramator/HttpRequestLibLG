<?php
require 'httpRequest.php';
$request = new httpRequest;

// $request->requestArray[CURLOPT_USERAGENT] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36'; // set new curl options

// $request->requestHeaders['accept-encoding'] = 'gzip, deflate, br';


// $apiKey = 'XXXX'; /// use your apiKey and replace XXXX string

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
//     "https://api.wspoonacular.com/recipes/4632/summary", 
//     "GET"
// ); // GET example

/// example of a simple GET request

// $request->requestArray[CURLOPT_AUTOREFERER] = 2;
// $request->requestArray[CURLOPT_CONNECTTIMEOUT] = 2;

// // custom the error with new string text

// $request->errorsArray["Connection timed out after 2000 milliseconds"] = 'Put a larget than 2 seconds CURLOPT_CONNECTTIMEOUT and CURLOPT_AUTOREFERER on curl request !!!';
// $request->errorsArray["Operation timed out after 2000 milliseconds with 0 out of 0 bytes received"] = 'Put a larget than 2 seconds CURLOPT_CONNECTTIMEOUT and CURLOPT_AUTOREFERER on curl request !!!';

// $response = $request->request("https://gmail.com/");

$response = $request->request("https://google.com/");

echo $response;

// var_dump( $response );
?>