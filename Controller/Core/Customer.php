<?php
namespace Controller\Core;
\Mage::loadByClass('Controller\Core\Abstracts');
\Mage::loadByClass('Block\Customer\Layout');


class Customer extends \Controller\Core\Abstracts{

    private $layout = null;
    public function __construct() {
        parent::__construct();
    }
   
    public function setLayout( $layout=Null)
    { 
        try {
            if (!$layout) {
                $layout = \Mage::getBlock('Block\Customer\Layout');   
            } 
            
            if (!$layout instanceof \Block\Customer\Layout) {
                throw new Exception("Must be instance of \Block\Customer\Layout");
            }
            $this->layout = $layout;  
            return $this;
        } catch (Examption $th) {
            echo $th->setMessage();
        }
        
    }

    public function setMessage()
    {
        $this->message = \Mage::getModel('Model\Customer\Message');
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