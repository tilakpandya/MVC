<?php
namespace Block\Customer\Layout\HomePage;
\Mage::loadByClass('Block\Core\Template');
class BrandPanel extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\homepage\brandpanel.php');
    }

    public function getBrands()
    {
       $brands=\Mage::getModel('Model\Brand')->fetchAll();
       return $brands;
    }

}
?>