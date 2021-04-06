<?php

spl_autoload_register(__NAMESPACE__.'\Mage::loadByClass'); 

class Mage
{
    private $Registry=Null;
    public static function init()
    {
       \Controller\core\Front::init(); 
    }

    public static function loadByClass($className)
    {
      $className = ucwords(str_replace('\\',' ',$className));
      $className = str_replace(' ','/',$className);
     /*  echo "<br>";
      print_r($className);  */
      require_once $className.'.php' ;
    }

    public function getModel($className)
    {
        $className = str_replace('\\',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','\\',$className);
      
        return new $className();
    }

    public function getController($className)
    {
        $className = str_replace('\\',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','\\',$className);
        return new $className();
    }

    public  function getBlock($className,$ton=false,$controller=NULL)
    {
        if (!$ton) {
            $className = str_replace('\\',' ',$className);
            $className = ucwords($className);
            $className = str_replace(' ','\\',$className);
            return new $className($controller);
        }
        $value = self::getRegistry($className);
        if ($value) {
            return $value;
        }
        self::loadByClass($className);
        $className = str_replace('\\',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','\\',$className);
        $value = new $className($controller);
        return $value;
    }

    public static function getBaseDir($subPath = NULL)
    {
        if ($subPath) {
            return getcwd().DIRECTORY_SEPARATOR.$subPath;
        }
        return getcwd();
    }

    public static function getRegistry($key,$optional=null)
    {
        if (!array_key_exists($key,$GLOBALS)) {
           return $optional;
        }
        
        return $GLOBALS[$key];
    }
    public static function setRegistry($key,$value)
    {
        $GLOBALS[$key] = $value;
        
    }
}
Mage::init();
?>