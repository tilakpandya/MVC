<?php
namespace Block\Home;
\Mage::loadByClass('Block\Core\Template');
class LoginPage extends \Block\Core\Template
{
    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\home\loginpage.php');
    }

}  