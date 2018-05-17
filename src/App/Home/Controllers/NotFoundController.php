<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * Date: 17/05/2018
 * Time: 00:20
 */

namespace App\Home\Controllers;


use Config\Config;
use SIGA\Mvc\AbstractController;
use SIGA\Mvc\View;

class NotFoundController extends AbstractController
{

    public function index()
    {
        $this->request->setRoute(Config::PATH_HOME);
        $view = new View($this->request);
        $view->setTemplate("index/404");
        return $view;
    }
}