# HttpRequestLibLG
Example of using it:


1: For a simple GET request:

    $response = $request->request("https://google.com/");
    
    echo $response;
    
2: For a simple api GET request:

    $apiKey = 'XXXX'; /// use your apiKey and replace XXXX string
    
    $request->requestHeaders = [
    'Content-Type' => 'application/json'
    ];

    $request->queriesArray = [
        'apiKey' => $apiKey
    ];

    $response = $request->request(
        "https://api.wspoonacular.com/recipes/4632/summary", 
        "GET"
    );
    
    echo $response;

3: For a simple api POST request:
    
     $apiKey = 'XXXX'; /// use your apiKey and replace XXXX string
    
     $request->requestHeaders = [ // set new headers
       'Accept' => 'text/html',
       'Content-Type' => 'application/x-www-form-urlencoded'
    ];
    
    // $request->requestHeaders['Accept'] = 'text/html'; // add new headers
  
    $request->queriesArray = [ // add query to url
       'apiKey' => $apiKey
    ];

    $response = $request->request( // make the request
       "https://api.spoonacular.com/recipes/visualizeIngredients?apiKey=" . $apiKey, 
       "POST", 
      [ // set POST request payload
           'spoonacularApiKey' => $apiKey,  
           'servings' => 2,
           'measure' => 'metric',
           'viewStyle' => 'grid'
       ]); // example request food api
       
       echo $response;
       
3: For a simple api SOAP request:

    $xmlRaw  =  '<?xml version="1.0" encoding="utf-8"?>
                  <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                      <soap:Body>
                          <NumberToWords xmlns="http://www.dataaccess.com/webservicesserver/">
                          <ubiNum>500</ubiNum>
                          </NumberToWords>
                      </soap:Body>
                  </soap:Envelope>';  


    $request->requestHeaders = [
        'Content-Type: text/xml'
    ];

    $response = $request->request("https://www.dataaccess.com/webservicesserver/NumberConversion.wso", "POST", $xmlRaw);

    echo $response;
