<?php
class httpRequest {

    public $errorsArray = [
        'UrlMissing' => 'Url needs to be set.',
    ];

    public $requestHeaders = [
        'Connection' => 'keep-alive',
        'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'accept-language' => '',
    ];

    public $requestArray = [ 
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // Accept gzip/deflate/whatever.
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_USERAGENT      => "" 
    ];

    protected function TrowCustomError($errorKey, $type = E_USER_ERROR){
        // E_USER_NOTICE             // Notice (default)
        // E_USER_WARNING            // Warning
        // E_USER_ERROR              // Fatal Error
        return trigger_error($this->errorsArray[$errorKey], $type);
    } 

    function request($url, $method = 'GET'){
        if(!isset($url) || empty($url)){
            $this->TrowCustomError('UrlMissing'); 
        }
        try{
            $curl = curl_init($url); // Initializes a new cURL session
            curl_setopt ($curl, CURLOPT_URL, $url);
            curl_setopt ($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt ($curl, CURLOPT_HTTPHEADER, $this->requestHeaders);
            curl_setopt_array($curl,  $this->requestArray);
            $response = curl_exec($curl);
            curl_close($curl); // Close cURL session
        } catch(Exception $e) {
            trigger_error(sprintf('Curl failed with error #%d: %s', $e->getCode(), $e->getMessage()), E_USER_ERROR);
        } 
        return $response;
    }

}