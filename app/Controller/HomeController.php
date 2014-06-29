<?php
namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use Controller\Controller as BaseController;

class HomeController extends BaseController {
	
	public function indexAction(Application $app, Request $request) {
		
		$app['monolog']->addDebug(__CLASS__ . '::' . __FUNCTION__);
		
		return $app['twig']->render('home.html.twig');
	}
	
}
