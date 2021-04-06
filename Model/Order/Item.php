<?php
namespace Model\Order;

class Item extends \Model\Core\Table
{   
    public function __construct() {
        $this->setTableName('order_item');
        $this->setPrimaryKey('orderItemId');
    }

}
?>