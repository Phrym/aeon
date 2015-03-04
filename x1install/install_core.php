<?php


require __DIR__.'/../bootstrap/autoload.php';
require __DIR__.'/../vendor/autoload.php';

use \Illuminate\Config\LoaderInterface as Config;

$app_info['app_name'] = Config::get('');