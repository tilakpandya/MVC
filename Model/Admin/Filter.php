<?php
namespace Model\Admin;
\Mage::getModel('Model\Admin\Session');

class Filter extends \Model\Admin\Session
{
 
    protected $filter=null;
   public function setFilter($filters)
   {
      if (!$filters) {
         
      }
      $filters = array_filter(array_map(function($value){
        return array_filter($value);
      },$filters));
      
      $this->filters = $filters;
   }

   public function getFilters()
   {
       return $this->filters;
   }

   public function hasFilters()
   {
       if (!$this->filters) {
           return false;
       }
       return true;
   }

   public function getFilterValue($type,$key)
   {

       if (!$this->filters) {
           return null;
       }
       if (!array_key_exists($type,$this->filters)) {
           return null;
       }
       if (!array_key_exists($key,$this->filters[$type])) {
            return null;
       } 
       return $this->filters[$type][$key];
   }

    public function getFilter()
    {
        if (!$this->filter) {
            $this->filter = \Mage::getModel('Model\Admin\Filter');
        }
        return $this->filter; 
    }

   public function remove()
   {
        $this->filter = null;
   }
}

?>