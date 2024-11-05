<?php
	require_once "routes.php";
	//require das classes
	spl_autoload_register(function ($class) {
		if(file_exists('controllers/' . $class . '_class.php'))
			require_once 'controllers/' . $class . '_class.php';
		else if(file_exists('models/' . $class . '_class.php'))
			require_once 'models/' . $class . '_class.php';
	});

	
	
	$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
	
	$uri = substr($uri, strpos($uri, '/', 1));
	
	Route::route_init($_SERVER["REQUEST_METHOD"], $uri);

?>