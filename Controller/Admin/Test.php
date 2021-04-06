<?php
namespace Controller\Admin;

class Test extends \Controller\Core\Admin
{
    protected $arr = [];
    public function LcmAction()
    { 
       $number = $_GET['n'];
       $factor = 2;

       while ($number != 1) {
           
           if ($number % $factor == 0) {
              $number = $number/$factor;
              array_push($this->arr,$factor);
           }
           else{
                $factor++;
           }
       }
       print_r($this->arr);
    }

    public function testAction()
    {
        $number = 4567;
        $factor = 6;
        $totalDigit = strlen((string)$number);
        
        for ($i=0; $i <= $totalDigit; $i++) { 
            
        }
    }
}

?>