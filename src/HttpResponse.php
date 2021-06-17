<?php 
class HttpResponse
{
    private $response;
    private $statusCode;

    function __construct($response, $statusCode)
    {
        $this->response = $response;
        $this->statusCode = $statusCode;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getStatusCode()
    {
        return $this>statusCode;
    }

    public function IsStatusSuccess()
    {
        if($statusCode >= 200 && $statusCode < 300) 
        {
            return true;
        } else
        {
            return false;
        }
    }


}

?>