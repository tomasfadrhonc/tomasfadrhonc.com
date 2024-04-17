<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->addRoute('/login', 'Auth:Auth:login');
		$router->addRoute('/register', 'Auth:Auth:register');
		$router->addRoute('/admin', 'Admin:Admin:default');
		$router->addRoute('/', 'Front:Home:default');

		return $router;
	}
}
