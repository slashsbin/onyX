<?php
require_once __DIR__.'/prod.php';

// App
$app['debug'] = true;

// Monolog
$app['monolog.logfile'] = __DIR__.'/../../logz/app_dev.log';
$app['monolog.level'] = 100; // = Logging::DEBUG



