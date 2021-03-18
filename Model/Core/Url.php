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

    public function getUrl($actionName = NULL, $controllerName=NULL,
    $params=NULL,$resetparam=false)
    {

        $final = $this->getRequest()->getGet(); 
       
        if ($resetparam) {
            $final = [];
        }
        if ($actionName == NULL ) {
            $actionName = $_GET['a'];
        }
        if ($controllerName == NULL ) {
            $controllerName = $_GET['c'];
        }
        
        $final['c']=$controllerName;
        $final['a']=$actionName;

        if (is_array($params)) {
            $final = array_merge($final,$params);
        }  
        $queryString = http_build_query($final); //c=product&a=grid
        unset($final);
        
        return "http://localhost:8080/Questecome/index.php?{$queryString}";
        //exit(0);
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