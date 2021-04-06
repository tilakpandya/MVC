<?php
namespace Block\Customer\Layout\ProductDetailPage;
\Mage::loadByClass('Block\Core\Template');
class BottomDetailPanel extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\productdetailpage\bottomdetailpanel.php');
    }

}
?>