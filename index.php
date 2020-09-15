<?php
require 'httpRequest.php';
$request = new httpRequest;

// $request->requestArray[CURLOPT_USERAGENT] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36'; // set new curl options

// $request->requestHeaders['accept-encoding'] = 'gzip, deflate, br';

$response = $request->request("https://www.google.com/", "GET"); // GET example

echo $response;

// var_dump( $response );
?>