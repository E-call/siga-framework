<?php
/**
 *  Verificar se o autoload do composer esta configurado
 */

$composer_autoload = __DIR__."/../vendor/autoload.php";

if(!file_exists($composer_autoload)){
    die("Execute o composer install");
}
require $composer_autoload;

$run = new \SIGA\Mvc\Run();

$run->init();