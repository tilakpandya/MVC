<?php
namespace Block\Core;
\Mage::getBlock('Block\Core\Template');

class Grid extends \Block\Core\Template
{
    protected $collection=[];
    protected $columns=[];
    protected $actions = [];
    protected $button = [];
    

    public function __construct() {
        parent::__construct();
        $this->setTemplate("./View/core/grid.php");
        $this->prepareCoulmns();
        $this->prepareActions();
        $this->prepareCollection();
        $this->prepareButtons();
    }

    public function prepareCollection()
    {
        return $this;
    }
    public function getCollection()
    {
        if (!$this->collection) {
            $this->prepareCollection();
        }
        return $this->collection;
    } 
    
    public function setCollection($collection)
    {
        $this->collection = $collection;
        return $this;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function addColumn($key,$value)
    {
       $this->columns[$key] = $value;
       return $this;
    }
    public function prepareCoulmns()
    {
       return $this;
    }

    public function getFieldValue($row,$field)
    {
       return $row->$field;
    }

    public function getActions()
    {
        return $this->actions;
    }

    public function addActions($key,$value)
    {
       $this->actions[$key] = $value;
       return $this;
    }
    
    public function prepareActions()
    {
        return $this;
    }

    public function getMethodUrl($row,$methodName)
    {
       return $this->$methodName($row);
    }


    public function getTitle()
    {
      return 'Manage Module';
    }

    public function getButtons()
    {
        return $this->button;
    }

    public function addButtons($key,$value)
    {
       $this->button[$key] = $value;
       return $this;
    }
    
    public function prepareButtons()
    {
       return $this;
    }

    public function getButtonUrl($methodName)
    {
       return $this->$methodName();
    }
    
}

?>