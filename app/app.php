<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Provider\TwigCoreExtension;

require_once __DIR__ . '/bootstrap.php';

$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
	$twig->addGlobal('vendorVersions', implode(' | ', array(
			'Sx:'.Silex\Application::VERSION,
			'Tg:'.Twig_Environment::VERSION,
			'Sf:'.Symfony\Component\HttpKernel\Kernel::VERSION,
			'Dc:'.Doctrine\DBAL\Version::VERSION
			)));

	return $twig;
}));

//===={ General Controllers }===================================================
$app->get('/', 				'Controller\HomeController::indexAction');
//==================================================={ General Controllers }====

$app['monolog']->addDebug('Route Matched & Ready to run app');
return $app;



