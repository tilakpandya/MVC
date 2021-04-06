<?php 
namespace Controller\Admin;

class User extends \Controller\Core\Admin
{
    public function testAction()
    {
        echo "<pre>";
        $query="SELECT * from `product` WHERE `id`='1' ORDER by `id` ASC";
        $product = \Mage::getModel('Model\Product')->fetchRow($query);
        //$product->sku = 11;
        $product->name = 'product11';
        print_r($product);
    }
}

?>