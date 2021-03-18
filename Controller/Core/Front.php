<?php
namespace Controller\Core;

class Front{
    public static function init()
    {
        
        $request = \Mage::getModel('Model\Core\Request');
        
        $controllerName = $request->getControllerName();
        $actionName=$request->getActionName().'Action';

        $controllerName = self::prepareClassName($controllerName,'Controller');            
        $controller = \Mage::getController($controllerName);
        $controller->$actionName();
        //print_r($controllerName);
    } 

    public function prepareClassName($key,$nameSpace)
    {
        $className = $nameSpace.'_'.$key;
        $className = str_replace('_',' ',$className);
        $className = ucwords($className);
        $className = str_replace(' ','\\',$className);
        return $className;
    } 

    
}

?>