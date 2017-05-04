<?php
use App\Controllers\Controller;
use App\Database;

// Sökväg till grundmappen i projektet --- this is a constant in PHP, built-in the language
$baseDir = __DIR__ . '/..';

// Ladda in Composers autoload-fil -- all classes in the project will be loaded automatically AS LONG AS WE FOLLOW namespaces.
// important that class bares the same name as the file name. Otherwise Composer will simply not be able to find your classes
// and load them for you in your project. This convention was simply decided by PhP regulating body. Composer follows
// recommendations and standards from PhP group.
// ** Class names are capitalized as a convention. **
require $baseDir . '/vendor/autoload.php';

// Ladda konfigurationsdata --- connection to database
$config = require $baseDir. '/config/config.php';



// Normalisera url-sökvägar  ---
$path = function($uri) {
	return ($uri == "/") ? $uri : rtrim($uri, '/');
};


//databse connection
$dsn = 'mysql:host='.$config['db_host'].';dbname='.$config['db'].';charset='.$config['charset'];
$pdo = new PDO($dsn, $config['user'], $config['password'], $config['options']);

$db = new Database($pdo);
$tider = new Tider($db);
$tider = $db->getById('bokadetider', 1);
$tider = $db->getById('bokadetider');

// Routing
$controller = new Controller($baseDir);

switch ($path($_SERVER['REQUEST_URI'])) {
	case '/':
		$controller->index();
	break;
    case '/test':
        echo "This is a routing test.";
        break;
	default:
		header('HTTP/1.0 404 Not Found');
		echo 'Page not found.';
	break;
}