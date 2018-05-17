<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * Date: 16/05/2018
 * Time: 10:33
 */

namespace SIGA\Mvc;


use Config\Config;
use Zend\Diactoros\ServerRequestFactory;

class Request
{

    protected $uri=[];
    protected $route= Config::PATH_HOME;
    protected $controller = "index";
    protected $action = "index";
    protected $id = null;
    protected $diactoros;

    public function __construct()
    {

        $this->diactoros = ServerRequestFactory::fromGlobals(
            $_SERVER,
            $_GET,
            $_POST,
            $_COOKIE,
            $_FILES
        );
        $this->setUri($this->diactoros->getUri()->getPath())
            ->setRoute($this->uri[1]);
    }

    /**
     * @return array
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param array $uri
     * @return Request
     */
    public function setUri($uri)
    {
        $this->uri = explode("/",$uri);
        return $this;
    }

    /**
     * @param string $route
     * @return Request
     */
    public function setRoute($route)
    {
        if(!empty($route)){
            if(ucfirst($route) == Config::PATH_ADMIN){
                $this->route = Config::PATH_ADMIN;
            }
            else{
                $this->route = $route;
            }
        }
        return $this;
    }


    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }


    /**
     * @return string
     */
    public function getController()
    {
        if(isset($this->uri[2])){
            $this->controller = $this->uri[2];
        }
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        if(isset($this->uri[3])){
            $this->action = $this->uri[3];
        }
        return $this->action;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Zend\Diactoros\ServerRequest
     */
    public function getDiactoros()
    {
        return $this->diactoros;
    }


}