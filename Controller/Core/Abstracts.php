<?php
namespace Controller\Core; 
\Mage::loadByClass('Block\Customer\Layout');
//.\Controller\Customer\Abstracts.php
class Abstracts 
{
    protected $request =NULL;
    private $layout = null;
    private $message = NULL;
    
    public function __construct() {

        $this->setRequest();
        $this->setLayout();
        $this->setMessage();
    }
    public function getRequest()
    {
        return $this->request;
    }

    public function setRequest()
    {
        $this->request = \Mage::getModel('Model\core\Request');
        return $this;
    }
     public function redirect($actionName = NULL, $controllerName=NULL,
    $params=NULL,$resetparam=false) 
    {
       
        header("location:{$this->getUrl($actionName,$controllerName,$param=NULL,$resetparam=NULL)}");
        exit(0);
    }  

    public function getUrl($actionName = NULL, $controllerName=NULL,
    $params=NULL,$resetparam=false)
    {
        $final = $_GET; 
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
    }  

    public function getLayout()
    { 
        if (!$this->layout) 
        {
            $this->setLayout();
        }
        return $this->layout;
    }

    public function setLayout( $layout=Null)
    {
        if (!$layout) {
           $layout = \Mage::getBlock('Block\Core\Layout');
        }
        $this->layout = $layout;
        return $this;
    }

    public function renderLayout()
    {
       echo $this->getLayout()->ToHtml();
    }

    public function getMessage()
    {
        echo 1;
        if (!$this->message) {
            $this->setMessage();
        }
        
        return $this->message;
    }

    public function setMessage()
    {
        echo 2;
        //$this->message = \Mage::getModel('Model\Core\Message');
        return $this;
    }
}

?>
