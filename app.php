<?php


$dirname = dirname(__FILE__);
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

require_once $dirname . '/helpers.php';


require_once $dirname . '/app/core/Loader.php';
require_once $dirname . '/app/libs/Smarty.class.php';

$basename = basename($dirname);

$autoloader = new Loader();

$autoloader->register();

$class = getclass();
 
Bootstrap::app($class);

function getclass() {
    $dirname = dirname(__FILE__);
    $basename = basename($dirname);

    return ucfirst($basename);
}
