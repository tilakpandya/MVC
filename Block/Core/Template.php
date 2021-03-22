<?php
namespace Block\Core;

class Template
{
    protected $controller=null;
    protected $template = null;
    protected $children = [];
    protected $url =null;
    protected $request = null;

    public function __construct() {
     $this->setUrl();
     //$this->setRequest();  
    }
    public function getController()
    {
        return $this->controller;
    } 

    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    public function getTemplate()
    {  
        return $this->template;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
    
    public function toHtml()
    {
         ob_start();
         require_once $this->getTemplate();
         $contents = ob_get_contents();
         ob_end_clean();
         return $contents;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function setChildren(array $children=[])
    {
        $this->children = $children;

        return $this;
    }
    
    public function addChild(\Block\Core\Template $child, $key = null){
        if (!$key) {
            $key = get_class($child);
        }
        $this->children[$key] = $child;
        return $this;
    }

    public function getChild($key){
        
        if (!array_key_exists($key,$this->children)) {
            return null;
        }
        return $this->children[$key];
    }

    public function removeChild($key){
        if (array_key_exists($key,$this->children)) {
           unset($this->children[$key]);
        }
        return $this;
    }

    public function CreateBlock($classname)
    {
       return \Mage::getBlock($classname);
    }

    public function getMessage()
    {
        return \Mage::getModel('Model\Admin\Message');
    }

    public function getUrl()
    {
        if (!$this->url) {
            $this->setUrl();
        }
        return $this->url;
    }
    public function setUrl($url=NULL)
    {
        if (!$url) {
            $url = \Mage::getModel('Model\Core\Url');
        }
        $this->url = $url;
        return $this;
    }


    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }

    public function setRequest($request=NULL)
    {
        if (!$request) {
            $request = \Mage::getModel('Model\Core\Request');
        }
        $this->request = $request;
        return $this;
    }

    public function baseUrl($subUrl=NULL)
    {
      return $this->getUrl()->baseUrl($subUrl);
    }

    
}

?>