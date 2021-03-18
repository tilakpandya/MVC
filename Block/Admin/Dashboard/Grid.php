<?php

namespace Block\Admin\Dashboard;
\Mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $payments=NULL;
    
    public function __construct() {
       $this->setTemplate("./View/Admin/dashboard/grid.php");
    }

}

?>