<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com
 * Date: 16/05/2018
 * Time: 10:48
 */

namespace Config;


class Config
{

    const BASE_PATH = __DIR__.'/../';
    const DEFAULT_EXT = 'phtml';
    const CONTROLLER_NAMESPACE = "App\\%s\\Controllers\\%sController";
    const CONTROLLER_NOT_FOUND = "App\\Home\\Controllers\\NotFoundController";
    const PATH_ADMIN = "Admin";
    const PATH_HOME = "Home";
    const DEBUG_APP = false;
}