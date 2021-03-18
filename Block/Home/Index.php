<?php
namespace Block\Home;
\Mage::loadByClass('Block\Core\Template');
class index extends \Block\Core\Template
{

    public function __construct(Type $var = null) {
       parent::__construct();
       $this->setTemplate('.\View\home\index.php');
    }
}  

