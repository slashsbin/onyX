<?php
$autoLoader = require_once __DIR__.'/../vendor/autoload.php';

Symfony\Component\HttpKernel\Debug\ErrorHandler::register();
$app = new Silex\Application();

$app['__ENV__'] = $_SERVER['__ENV__'] ?: 'prod';

require __DIR__.'/config/'.$app['__ENV__'].'.php';

if( $app['app.prerequisite.enforce'] ) {
	$reqMsg = 'Unmet Dependencies for ' . $app['app.title'] . ' v' . $app['app.version'] . '[codeName '.$app['app.namespace'].']: ';
	version_compare(PHP_VERSION, $app['app.prerequisite.phpVersion'], '>=') || $app->abort(400, $reqMsg.'PHP v'.$app['app.prerequisite.phpVersion'].'+ [RUNTIME: '.PHP_VERSION.']');
}

$autoLoader->add($app['app.namespace'], __DIR__.'/model');

$app->register(new Silex\Provider\HttpCacheServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider(),array(
		'session.storage.options.name'		=> $app['session.storage.options.name'],
		'session.storage.options.id'		=> $app['session.storage.options.id'],
		'session.storage.options.http_only'	=> $app['session.storage.options.http_only']
		));
$app->register(new Silex\Provider\MonologServiceProvider(), array(
		'monolog.logfile' => $app['monolog.logfile'],
		'monolog.name'    => $app['monolog.name'],
		'monolog.level'   => $app['monolog.level']
));
$app->register(new Silex\Provider\TwigServiceProvider(), array(
		'twig.options' => array(
				'cache' => $app['twig.options.cache'] ?: false,
				'strict_variables' => true,
				'debug' => $app['twig.options.debug']
		),
		'twig.path' => $app['twig.path']
));
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
		'db.options' => $app['db.options']
));
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
		'locale_fallback' => 'en'
));
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\FormServiceProvider());

$app['monolog']->addDebug('Bootstrap Completed');