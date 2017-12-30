<?php
/**
 * Created by PhpStorm.
 * User: alexandre
 * Date: 30/12/2017
 * Time: 12:13
 */


// web/index.php
require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();

$app->get('/hello/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name);
});

$app->run();