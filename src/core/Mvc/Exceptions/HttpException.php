<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * Date: 16/05/2018
 * Time: 11:40
 */

namespace SIGA\Mvc\Exceptions;


use Config\Config;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Throwable;

class HttpException extends \Exception
{
 public function __construct($message = "", $code = 0, Throwable $previous = null)
 {

     $log = new Logger('name');
     $path = sprintf( '%s/data/error-%s.log', Config::BASE_PATH, date("Y-m-d"));
     $log->pushHandler(new StreamHandler($path, Logger::WARNING));
     $file = $this->getFile();
     $line = $this->getLine();
     $trace = $this->getTraceAsString();

     $str[] = "\n\nCode:\n" . $code . PHP_EOL;
     $str[] = "\n\nFile:\n" . $file . PHP_EOL;
     $str[] = "\n\nLine: " . $line . PHP_EOL;
     $str[] = "\n\nException:\n" . $message . PHP_EOL;
     $str[] = "\nTrace:\n\n" . $trace . PHP_EOL;
     $str[] = "\n\n------------------------------------------------------------------------------------------------" . PHP_EOL . PHP_EOL . PHP_EOL;

     $log->addError(implode(PHP_EOL, $str));
     header('HTTP/1.1 404 Not Found');
     if(Config::DEBUG_APP):
     ?>
     <ul>
         <?php
         foreach ($str as $item) :?>
             <li><?=$item?></li>
         <?php endforeach;?>
     </ul>
     <?php
     endif;
     http_response_code(404);
     parent::__construct($message, $code, $previous);
 }
}