<?php
/**
 *  Verificar se o autoload do composer esta configurado
 */

$composer_autoload = __DIR__."/../vendor/autoload.php";

if(!file_exists($composer_autoload)){
    die("Execute o composer install");
}
require $composer_autoload;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

try {

} catch (Exception $e) {
    $log = new Logger('name');
    $path = __DIR__ . '/../data/error.log';
    $log->pushHandler(new StreamHandler($path, Logger::WARNING));
    $code = $e->getCode();
    $messages = $e->getMessage();
    $file = $e->getFile();
    $line = $e->getLine();
    $trace = $e->getTraceAsString();

    $str[] = "\n\nCode:\n" . $file . PHP_EOL;
    $str[] = "\n\nFile:\n" . $file . PHP_EOL;
    $str[] = "\n\nLine: " . $line . PHP_EOL;
    $str[] = "\n\nException:\n" . $messages . PHP_EOL;
    $str[] = "\nTrace:\n\n" . $trace . PHP_EOL;
    $str[] = "\n\n------------------------------------------------------------------------------------------------" . PHP_EOL . PHP_EOL . PHP_EOL;

    $log->addError(implode(PHP_EOL, $str));
    header('HTTP/1.1 404 Not Found');?>
 <ul>
     <?php
     foreach ($str as $item) :?>
     <li><?=$item?></li>
     <?php endforeach;?>
 </ul>
  <?php
}