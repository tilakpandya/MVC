<?php
namespace Block\Customer\Layout\HomePage;
\Mage::loadByClass('Block\Core\Template');
class BannerPanel extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\homepage\bannerpanel.php');
    }

    public function getBanner()
    {
       $query = "SELECT * FROM `category_media` WHERE `banner` = '1'";
       $brands=\Mage::getModel('Model\CategoryMedia')->fetchAll($query);
       return $brands;
   }

}
?>