<?php
namespace Block\Admin\Product;
\Mage::getBlock('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    protected $filter = null;
    public function prepareCollection()
    {
        
        $collection = \Mage::getModel('Model\Product');
        $query = "SELECT * FROM `{$collection->getTableName()}`";
        $filter = \Mage::getModel('Model\Admin\Filter');

        if($this->getFilter()->hasFilters()){
            $query = $query." WHERE 1=1";
            foreach ($this->getFilter()->getFilters() as $type => $filters) {
                if ($type = 'text') {
                   foreach ($filters as $key => $value) {
                       $query = $query." AND {$key} LIKE '%{$value}%'";
                   }
                }
            }
        }
       
        $collection=$collection->fetchAll($query); 
        $this->setCollection($collection);
        return $this;
    }

    public function getFilter()
    {
        if (!$this->filter) {
            $this->filter = \Mage::getModel("Model\Admin\Filter");
        }
        return $this->filter;
    }

    public function prepareCoulmns()
    {
        $this->addColumn('id',[
            'field'=>'id',
            'label'=>'Product Id',
            'type'=>'number'
        ]);

        $this->addColumn('name',[
            'field' => 'name',
            'label'=>'Product name',
            'type'=>'text'
        ]);

        $this->addColumn('price',[
            'field' => 'price',
            'label'=>'price(₹)',
            'type'=>'number'
        ]);

        $this->addColumn('discount',[
            'field' => 'discount',
            'label'=>'discount(₹)',
            'type'=>'number'
        ]);
        
        $this->addColumn('quantity',[
            'field' => 'quantity',
            'label'=>'quantity',
            'type'=>'number'
        ]);

        $this->addColumn('status',[
            'field' => 'status',
            'label'=>'Status',
            'type'=>'text'
        ]);
    }

    public function prepareActions()
    {
        $this->addActions('edit',[
            'label'=>'Edit',
            'method'=>'getEditUrl',
            'ajax' =>false
        ]);

        $this->addActions('delete',[
            'label'=>'Delete',
            'method'=>'getDeleteUrl',
            'ajax' => false
        ]);

        $this->addActions('addItemToCart',[
            'label'=>'addItemToCart',
            'method'=>'addItemToCart',
            'ajax' => false
        ]);
    }


    public function getEditUrl($row)
    {
       return $this->getUrl()->getUrl('form',null,['id'=>$row->id]);
    }
 
    public function getDeleteUrl($row)
    {
        return $this->getUrl()->getUrl('delete',null,['id'=>$row->id]);
    }

    public function getTitle()
    {
      return 'Products';
    }

    public function prepareButtons()
    {
        $this->addButtons('new',[
            'label'=>'Add New',
            'method'=>'getAddNewUrl',
            'ajax' =>false
        ]);
    }

    public function getAddNewUrl()
    {
       return $this->getUrl()->getUrl('form','Admin_Product_Product',null,true);
    }

    public function addItemToCart($row)
    {
     return $this->getUrl()->getUrl('addItemToCart','Admin_Cart',['id'=>$row->id],true);
    }

}

?>