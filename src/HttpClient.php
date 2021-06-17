<?php 

require_once 'HttpResponse.php';

class PhpHttpClient 
{
    public $BaseAdress;

    function __construct($baseAdress)
    {
        if(is_string($baseAdress)) 
        {
            if(filter_var($baseAdress, FILTER_VALIDATE_URL)) 
            {
                $this->BaseAdress = $baseAdress;
            } else
            {
                throw new Exception("First argument is NOT a VALID URL");
            }
        } else 
        {
            throw new Exception("First argument must be a string!");
        }
    }

    public function Get($uri, $headers)
    {
        // Send Get Request
        $ch = curl_init();
        $url = $this->BaseAdress . $uri;

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if(!$error) 
        {
            return new HttpResponse($response, $statusCode);
        } else 
        {
            throw new Exception($error);
        }


        
    }

    public function Post($uri, $header, $data)
    {
        
        $ch = curl_init();
        $url = $this->BaseAdress . $uri;

        $postFields = "";
        $indexCounter = 1;
        $length = count($data);
        foreach($data as $index => $value)
        {
            $postFields = $postFields . $index . "=" . $value;
            if($length != $indexCounter) {
                $postFields = $postFields . "&";
            }
            $indexCounter++;

        }

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HEADER, array());
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if(!$error)
            {
                return new HttpResponse($response, $statusCode);
            }else
            {
                throw new Exception($error);
            }

        
    }

}

?>