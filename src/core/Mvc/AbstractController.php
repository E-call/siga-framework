<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * Date: 16/05/2018
 * Time: 13:48
 */

namespace SIGA\Mvc;


abstract class AbstractController
{

    /**
     * @var Request
     */
    private $request;

    /**
     * AbstractController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    public function index(){
        $view = new View($this->request);

        return $view;
    }
}