<?php

namespace Controller\Admin;

class Dashboard extends \Controller\Core\Admin
{
    public function gridAction(Type $var = null)
    {
        $layout = $this->getLayout();
        $content = $layout->getChild('content');
        $grid = \Mage::getBlock('Block\Admin\Dashboard\Grid');
        $content->addChild($grid,'grid');
        echo $layout->toHtml();  
    }
}

?>