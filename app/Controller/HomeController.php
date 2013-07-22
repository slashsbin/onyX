<?php
namespace Controller;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

class HomeController extends Controller {
	
	public function indexAction(Application $app, Request $request) {
		
		$app['monolog']->addDebug(__CLASS__ . '::' . __FUNCTION__);
		
		return $app['twig']->render('home.html.twig');
	}
	
}