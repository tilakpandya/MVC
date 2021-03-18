<?php
namespace Controller\Core;
\Mage::loadByClass('Controller\Core\Abstracts');

class Admin extends \Controller\Core\Abstracts{

    private $layout = null;

   
    public function setLayout($layout=Null)
    {
        if (!$layout) {
           $layout = \Mage::getBlock('Block\Admin\Layout');
        }
        $this->layout = $layout;
        return $this; 
    }

    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Admin\Message');
        return $this;
    }
    public function getMessage()
    {   
        if (!$this->message) {
            $this->setMessage();
        }
        
        return $this->message;
    }
    public function getLayout()
    { 
        
        if (!$this->layout) {

            $this->setLayout();
        }
        return $this->layout;
    }

}

?>