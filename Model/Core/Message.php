<?php
namespace Model\Core;
\Mage::getModel('Model\Core\Session');

class Message extends \Model\Core\Session
{
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
    public function getFailure($message)
    {
       return $this->failure;
    }
}

?>