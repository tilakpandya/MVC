<?php 
namespace Controller\Core;
class Pager 
{
    protected $totalRecords = null;
    protected $recordsPerPage = null;
    protected $noOfPages = null;
    protected $start = 1;
    protected $end = null;
    protected $currentPage = 1;
    protected $previous = null;
    protected $next = null;

  
    public function getTotalRecords()
    {
        if (!$this->totalRecords) {
            $this->setTotalRecords();
        }
        return $this->totalRecords;
    }

    public function setTotalRecords($totalRecords=Null)
    {
        $this->totalRecords = $totalRecords;

        return $this;
    }


    public function getRecordsPerPage()
    {
        return $this->recordsPerPage;
    }
    public function setRecordsPerPage($recordsPerPage=Null)
    {
        $this->recordsPerPage = $recordsPerPage;

        return $this;
    }


    public function getNoOfPages()
    {
        return $this->noOfPages;
    }

    public function setNoOfPages($noOfPages=Null)
    {
        $this->noOfPages = (int)$noOfPages;

        return $this;
    }

 
    public function getStart()
    {
        if (!$this->start) {
            $this->setStart();
        }

        return $this->start;
    }

    public function setStart($start=Null)
    {
        $this->start = $start;

        return $this;
    } 

    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end=Null)
    {
        $this->end = $end;

        return $this;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }
    public function setCurrentPage($currentPage=null)
    {
        $this->currentPage = (int)$currentPage;

        return $this;
    }


    public function getPrevious()
    {
        return $this->previous;
    }
    public function setPrevious($previous)
    {
        $this->previous = $previous;

        return $this;
    }

    public function getNext()
    {
        return $this->next;
    }
    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    public function calculate()
    {
        if ($this->getTotalRecords() <= $this->getRecordsPerPage() ) {
            $this->setNoOfPages(1);
            $this->setEnd(null);
            $this->setPrevious(null);
            $this->setNext(null);
            return $this;
        }

        $page = ceil($this->getTotalRecords()/$this->getRecordsPerPage());
        $this->setNoOfPages($page);
        $this->setEnd($page);

        if ($this->getCurrentPage() > $this->getNoOfPages()) {
            $this->setCurrentPage($this->getNoOfPages());
        }
        if ($this->getCurrentPage() < $this->getStart()) {
            $this->setCurrentPage($this->getStart());
        }
        if ($this->getCurrentPage() == $this->getStart()) {
            $this->setPrevious(null);
            $this->getStart(null);

            if ($this->getCurrentPage() < $this->getNoOfPages()) {
                $this->setNext($this->getCurrentPage() + 1);
            }
            return $this;
        }

        if ($this->getCurrentPage() == $this->getEnd()) {
           $this->setNext(NULL);
           $this->setEnd(null);
        
           if ($this->getCurrentPage() >= $this->getNoOfPages()) {
                $this->setPrevious($this->getCurrentPage() - 1);
            }
            return $this;
        }

        if ($this->getCurrentPage() > $this->getStart() && $this->getCurrentPage() < $this->getEnd()) {
            $this->setPrevious($this->getCurrentPage() - 1);
            $this->setNext($this->getCurrentPage() + 1);
        } 
        return $this;
    }
 
}

?>