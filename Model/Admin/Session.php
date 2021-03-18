<?php
namespace Model\Admin;
\Mage::getModel('Model\Core\Session');

class Session extends \Model\Core\Session
{
    protected $nameSpace = Null;

    public function __construct() {
        parent::__construct();
        $this->setNameSpace('admin');
    }
   
}
