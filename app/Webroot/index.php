<?php
require __DIR__.'/../../vendor/autoload.php';

use App\Dispatcher;

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));


$dispatch = new Dispatcher();
$dispatch->dispatch();

