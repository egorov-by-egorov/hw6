<?php

namespace Base;

use Base\Exception\Error404;

class Application
{
    public function run()
    {
        try {
            if ($_SERVER["REQUEST_URI"]=='/'){
                header("Location:index/index");
            }
            $part = explode('/', $_SERVER["REQUEST_URI"]);
            echo $contollerName = $part[1];
            echo $actionName = $part[2];
            $controllerFileName = 'App\Controller\\' . ucfirst(strtolower($contollerName));

            if (!class_exists($controllerFileName)) {
                throw new Error404('class ' . $controllerFileName . ' not exist');
            }

            $actionFuncName = $actionName . "Action";
            session_start();
            $object = new $controllerFileName;
            if (!method_exists($object, $actionFuncName)) {
                throw new Error404('method ' . $actionFuncName . ' not found in ' . $controllerFileName);
            }
            $object->$actionFuncName();
            $tpl = '../App/Templates/' . ucfirst(strtolower($contollerName)) . "/" . $actionName . ".phtml";
            $view = new View();
            $object->view = $view;
            $object->view->render($tpl, $object);
        } catch (Error404 $e) {
            header('"HTTP/1.0 404 Not Found');
            trigger_error($e->getMessage());
        }
    }
}