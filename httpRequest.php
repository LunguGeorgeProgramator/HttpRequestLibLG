<?php
class httpRequest {

    public $errorsArray = [
        'UrlMissing' => 'Url needs to be set.',
        "401" => "tralala"
    ];

    public $requestHeaders = [
        'Connection' => 'keep-alive',
        'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'accept-language' => '',
    ];

    public $queriesArray = [];

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

    public function buildPostPayload($data){
        return json_encode($data); // separated in case someone needs to overide the payload logic
    }

    public function buildUlrQuery($url){
        $queryString = '';
        foreach($this->queriesArray as $key => $query){
            $queryString .= $key . '='. $query .'&';
        }
        return $url . (!empty($queryString) ? '?' . substr($queryString, 0, -1) : "");
    }

    protected function TrowCustomError($errorKey, $type = E_USER_ERROR, $e = Null){
        // E_USER_NOTICE             // Notice (default)
        // E_USER_WARNING            // Warning
        // E_USER_ERROR              // Fatal Error
        if (array_key_exists($errorKey, $this->errorsArray)) {
            return trigger_error(sprintf("Error Message: %s", $this->errorsArray[$errorKey]), $type);
        } else if ($e !== null) {
            return trigger_error(sprintf('Curl failed with error #%d: %s', $e->getCode(), $e->getMessage()), $type);
        } else {
            return trigger_error(sprintf('Curl failed with error: %s', $errorKey), $type);
        }
    } 

    function request($url, $method = 'GET', $payloadData = []){
        if(!isset($url) || empty($url)){
            $this->TrowCustomError('UrlMissing'); 
        }
        try{
            $curl = curl_init($url); // Initializes a new cURL session
            curl_setopt ($curl, CURLOPT_URL, $this->buildUlrQuery($url));
            curl_setopt ($curl, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt ($curl, CURLOPT_HTTPHEADER, $this->requestHeaders);
            if(isset($payloadData) && !empty($payloadData)){
                curl_setopt($curl, CURLOPT_POSTFIELDS, $this->buildPostPayload($payloadData));
            }
            curl_setopt_array($curl,  $this->requestArray);
            $response = curl_exec($curl);
            $error = curl_error($curl);
            if(!empty($error)){
                $this->TrowCustomError($error, E_USER_ERROR);
            }
            curl_close($curl); // Close cURL session
        } catch(Exception $e) {
            $this->TrowCustomError($e->code(), E_USER_ERROR, $e);
        } 
        return $response;
    }

}