<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * Date: 16/05/2018
 * Time: 13:54
 */

namespace SIGA\Mvc;


use Config\Config;
use SIGA\Mvc\Exceptions\HttpException;

class View
{

    protected $layout = "template";
    protected $template;
    protected $content;

    /**
     * @var Request
     */
    private $request;
    /**
     * @var array
     */
    private $data;

    public function __construct(Request $request, Array $data=[])
    {
        $this->request = $request;
        $this->data = $data;
    }

    public function render(){
        if(empty($this->template)):
            $this->content = $this->getFilesContent(sprintf("src/App/%s/views/%s/%s.%s",
                $this->request->getRoute(),
                $this->request->getController(),
                $this->request->getAction(),
                Config::DEFAULT_EXT));
        else:
            $this->content = $this->getFilesContent(sprintf("src/App/%s/views/%s.%s",
                $this->request->getRoute(),
                $this->template,
                Config::DEFAULT_EXT));
        endif;

        return $this->getFilesContent(sprintf("src/App/%s/views/layout/%s.%s",
            $this->request->getRoute(),
            $this->layout,
            Config::DEFAULT_EXT));
    }

    private function getFilesContent($file, Array $data=[]){

        if(!file_exists(sprintf("%s%s", Config::BASE_PATH, $file))){
            throw new HttpException(sprintf("template %s%s, not found", Config::BASE_PATH, $file));
        }

        if($data)
            extract($data);

        ob_start();
        include sprintf("%s%s", Config::BASE_PATH, $file);
        return ob_get_clean();
    }

    /**
     * @param string $layout
     * @return View
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * @param mixed $template
     * @return View
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return mixed
     */
    public function content()
    {
        echo $this->content;
    }

    public function __toString()
    {
        return $this->render();
    }
}





















