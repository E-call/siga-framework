<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * Date: 16/05/2018
 * Time: 15:49
 */

namespace App\Admin\Controllers;


use SIGA\Mvc\AbstractController;
use SIGA\Mvc\View;

class ProductController extends AbstractController
{

    public function create(){
        $view = new View($this->request);

        return $view;
    }
}