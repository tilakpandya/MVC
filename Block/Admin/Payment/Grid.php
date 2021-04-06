<?php
namespace Block\Admin\Payment;
\Mage::getBlock('Block\Core\Grid');

class Grid extends \Block\Core\Grid
{
    public function getId($id)
    {
       $id=$this->getController();
       $id->getRequest()->getGet('id');
       echo $id; 
    }

    public function prepareCollection()
    {
        $collection = \Mage::getModel('Model\Payment');
        $query = "SELECT * FROM `{$collection->getTableName()}`";
        $filter = \Mage::getModel('Model\Admin\Filter');

        if($filter->getFilter()->hasFilters()){
            $query = $query." WHERE 1=1";
            foreach ($filter->getFilter()->getFilters() as $type => $filters) {
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
            'label'=>'Id',
            'type'=>'number'
        ]);

        $this->addColumn('name',[
            'field' => 'name',
            'label'=>'name',
            'type'=>'text'
        ]);

        $this->addColumn('code',[
            'field' => 'code',
            'label'=>'code',
            'type'=>'text'
        ]);

        $this->addColumn('description',[
            'field' => 'description',
            'label'=>'description',
            'type'=>'text'
        ]);

        $this->addColumn('status',[
            'field' => 'status',
            'label'=>'status',
            'type'=>'text'
        ]);

        $this->addColumn('createdat',[
            'field' => 'createdat',
            'label'=>'created at',
            'type'=>'date'
        ]);

        $this->addColumn('updatedat',[
            'field' => 'updatedat',
            'label'=>'updatedat',
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
      return 'Payment';
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
       return $this->getUrl()->getUrl('form',null,null,true);
    }

   
}

?>