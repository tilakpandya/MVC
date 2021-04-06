<?php
namespace Block\Customer\Layout\CategoryPage;
\Mage::loadByClass('Block\Core\Template');
class BrandPanel extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\categorypage\brandpanel.php');
    }

    public function getBrandName(){
        $query="SELECT * FROM `brand`";
        return \Mage::getModel('Model\brand')->fetchAll($query);
    }
}
?>