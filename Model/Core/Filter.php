<?php
namespace Model\Core;
\Mage::getModel('Model\Core\Session');

class Filter extends \Model\Core\Session
{
    private $filter = null;
    public function setFilter($filter)
    {
       $this->filter = $filter;
       return $this;
    }
    
    public function getFilter()
    {
       return $this->filter;
    }

   
}

?>