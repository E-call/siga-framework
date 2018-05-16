<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * Date: 16/05/2018
 * Time: 11:40
 */

namespace SIGA\Mvc\Exceptions;


use Throwable;

class HttpException extends \Exception
{
 public function __construct($message = "", $code = 0, Throwable $previous = null)
 {
     http_response_code(404);
     parent::__construct($message, $code, $previous);
 }
}