<?php
namespace Model\Core\Table;
class Collection
{
    protected $data = [];
    
    public function getData()
    {
        return $this->data;
    }

    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function count()
    {
       return count($this->data);
    }

}

?>