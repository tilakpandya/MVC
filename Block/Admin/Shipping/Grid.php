<?php
namespace Block\Admin\Shipping;
\Mage::getBlock("Block\Core\Template");


class Grid extends \Block\Core\Template
{
    protected $shippings=NULL;

    public function __construct() {
        $this->setTemplate("./View/Admin/shipping/grid.php");
    }
    public function getShipping()
    {
        if (!$this->shippings) {
            $this->setShipping();
        }
        return $this->shippings;
    } 
    
    public function setShipping($shippings=NULL)
    {
        if (!$shippings){
            $shippings = \Mage::getModel('Model\Shipping');
            $shippings=$shippings->fetchAll();
        }
        
        $this->shippings = $shippings;
        return $this;
    }
 }

?>