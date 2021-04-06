<?php
namespace Block\Customer\Layout\CartPage;
\Mage::loadByClass('Block\Core\Template');
class CartPayment extends \Block\Core\Template
{

    public function __construct() {
       parent::__construct();
       $this->setTemplate('.\View\customer\layout\cartpage\cartpayment.php');
    }

   
}
?>