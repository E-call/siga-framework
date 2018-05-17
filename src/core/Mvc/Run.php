<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * Date: 16/05/2018
 * Time: 10:12
 */

namespace SIGA\Mvc;


use Config\Config;
use SIGA\Mvc\Exceptions\HttpException;

class Run
{

    /**
     * @var $request Request
     */
    protected $request;
    public function init(){
        $this->setRequest();
        echo $this->load($this->request->getRoute(), $this->request->getController(), $this->request->getAction());
    }

    private function load($env, $controller, $action){

        $controller = ucfirst($controller);
        $controller = sprintf(Config::CONTROLLER_NAMESPACE, $env, $controller);

        if (class_exists($controller)){
            $controller = new $controller($this->request);
            return $controller->$action();
        }
        new HttpException(sprintf("Controller %s,  not found",$controller));
        $controller = Config::CONTROLLER_NOT_FOUND;
        $controller = new $controller($this->request);
        return $controller->index();
    }

    private function setRequest(){
        $this->request = new Request();
        return $this;
    }
}