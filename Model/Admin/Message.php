<?php
namespace Model\Admin;
\Mage::getModel('Model\Admin\Session');

class Message extends \Model\Admin\Session
{
   public function __construct() {
      
   }
    public function setSuccess($message)
    {
      
       $this->success = $message;
       return $this;
    }
    public function getSuccess()
    {
       return $this->success;
    }

    public function setFailure($message)
    {
       $this->failure = $message;
       return $this;
    }
    public function getFailure()
    {
       return $this->failure;
    }

    public function clearSuccess()
    {
       unset($this->success);
       return $this;
    }

    public function clearFailure()
    {
       unset($this->failure);
       return $this;
    }
}
?>