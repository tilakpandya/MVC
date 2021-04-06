<?php
namespace Model\Core;
class Url 
{
    protected $request=null;
    
    public function __construct() {
        $this->setRequest();
    }
    
     public function getRequest()
    {
        return $this->request;
    }

    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\Core\Request');
        return $this;
    } 

    public function getUrl($method = NULL , $controller = NULL , $params = NULL , $clearParam = false)
	{
		$final = $_GET;
		if($clearParam)
		{
			$final = [];
		}
		if ($method == NULL) {
			$method = $_GET['a'];
		}
		if ($controller == NULL) {
			$controller = $_GET['c'];
		}
		$final['a'] = $method;
		$final['c'] = $controller;

		if(is_array($params)){
			$final = array_merge($final,$params);
		}
		$queryString = http_build_query($final);
		unset($final);
		$url = "http://localhost:8080/Questecome/index.php?{$queryString}";
		return $url;
	}
    
    public function baseUrl($subUrl=NULL)
    {
        $url = "http://localhost:8080/Questecome/";
        
        if ($subUrl) {
            $url .= $subUrl;
        }

        return $url;
    }
}

?>