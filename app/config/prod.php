<?php

// App
$app['app.title'] = 'onyX';
$app['app.version'] = '1.0.0-dev';
$app['app.namespace'] = 'onyX';
$app['app.salt'] = '';
$app['app.prerequisite.enforce'] = true;
$app['app.prerequisite.phpVersion'] = '5.4';

// Session
$app['session.storage.options.name'] = 'sBin__ONYX__';
$app['session.storage.options.id'] = 'sBin__ONYX__ID__';
$app['session.storage.options.http_only'] = true;

// Cache
$app['cache.path'] = __DIR__.'/../../cache';

// Http cache
$app['http_cache.cache_dir'] = $app['cache.path'].'/http';

// Monolog
$app['monolog.logfile'] = __DIR__.'/../../logz/app.log';
$app['monolog.name'] = $app['app.namespace'];
$app['monolog.level'] = 200; // = Logger::INFO

// Twig
$app['twig.path'] = __DIR__.'/../views';
$app['twig.options.cache'] = $app['cache.path'].'/twig';
$app['twig.options.debug'] = $app['debug'];

// DB
$app['db.options'] = array(
		'driver'   => 'pdo_mysql',
		'host'     => 'localhost',
		'dbname'   => 'onyX',
		'user'     => 'onyX',
		'password' => 'onyX',
);



