<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * Date: 16/05/2018
 * Time: 10:12
 */

namespace SIGA\Mvc;


class Run
{

    public function init(){
      d($this->getRequest()->getRoute());
    }

    private function load($env, $controller, $action){


    }

    private function getRequest(){
        return new Request();
    }
}