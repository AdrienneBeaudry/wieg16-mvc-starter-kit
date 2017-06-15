<?php
use App\Controllers\Controller;
use App\Database;
use App\Models\PatternModel;
use App\Models\FabricModel;
use App\Models\PairingModel;

// Sökväg till grundmappen i projektet --- this is a constant in PHP, built-in the language
$baseDir = __DIR__ . '/..';

// Ladda in Composers autoload-fil -- all classes in the project will be loaded automatically AS LONG AS WE FOLLOW namespaces.
// important that class bares the same name as the file name. Otherwise Composer will simply not be able to find your classes
// and load them for you in your project. This convention was simply decided by PhP regulating body. Composer follows
// recommendations and standards from PhP group.
// ** Class names are capitalized as a convention. **
require $baseDir . '/vendor/autoload.php';

// Ladda konfigurationsdata --- connection to database
$config = require $baseDir . '/config/config.php';


// Normalisera url-sökvägar  ---
$path = function ($uri) {
    $uri = ($uri == "/") ? $uri : rtrim($uri, '/');

    $uri = explode('?', $uri);
    $uri = array_shift($uri);

    return $uri;
};


//databse connection
$dsn = 'mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];
$pdo = new PDO($dsn, $config['db_username'], $config['db_password'], $config['options']);
$db = new Database($pdo);

$fabricModel = new FabricModel($db);
$patternModel = new PatternModel($db);
$pairingModel = new PairingModel($db);

$pairedFabrics = $fabricModel->getAllWithPatterns();

// Routing
$controller = new Controller($baseDir, $db);

$url = $path($_SERVER['REQUEST_URI']);

/*
$action = 'index';
$route = trim($url, '/');
if ($route != "") {
    $route = explode('-', $route);
    // $method = ['update', 'fabric']
    $action = array_shift($route);
    foreach ($route as $item) {
        $action .= ucfirst($item);
    }
}

if (method_exists($controller, $action)) {
    // update-fabrics - updateFabrics
    // $action = 'updateFabrics';
    $controller->{$action}();
    die();
}
else {
    header('HTTP/1.0 404 Not Found');
    echo 'Page not found';
}*/

switch ($url) {
    case '/':
        require $baseDir . '/views/index.php';
        break;

    case '/do-pairing-delete':
        $deletePairing = $pairingModel->deletePairing($_GET['fabric_id'], $_GET['pattern_id']);
        header('Location: /');
        break;

    case '/fabrics':
        $fabrics = $fabricModel->getAllOrder();
        require $baseDir . '/views/fabrics.php';
        break;

    case '/patterns':
        $patterns = $patternModel->getAllOrder();
        require $baseDir . '/views/patterns.php';
        break;

    case '/create':
        $fabrics = $fabricModel->getAll();
        $patterns = $patternModel->getAll();
        require $baseDir . '/views/add-new.php';
        break;

    case '/save-new-pattern':
        $patternModel = new patternModel($db);
        $patternId = $patternModel->create($_POST);
        header('Location:/patterns');
        break;

    case '/save-new-fabric':
        $fabricModel = new fabricModel($db);
        $fabricId = $fabricModel->create([
            'category' => $_POST['category'],
            'composition' => $_POST['composition'],
            'fabric_img_url' => $_POST['fabric_img_url'],
        ]);

        foreach ($_POST['paired'] as $paired) {
            $db->create('fabrics_patterns', ['fabric_id' => $fabricId, 'pattern_id' => $paired]);
        }

        header('Location:/fabrics');
        break;
        break;

    case '/save-new-pairing':
        $pairingModel = new pairingModel($db);
        $pairingId = $pairingModel->create($_POST);
        //header('Location:/fabrics');
        break;

    case '/update-fabric':
        $oneFabric = $fabricModel->getById($_GET['id']);
        require $baseDir . '/views/update-fabric.php';
        break;

    case '/update-pattern':
        $onePattern = $patternModel->getById($_GET['id']);
        require $baseDir . '/views/update-pattern.php';
        break;

    case '/do-fabric-update':
        $updateFabric = $fabricModel->update($_POST['id'], [
            'category' => $_POST['category'],
            'composition' => $_POST['composition'],
            'fabric_img_url' => $_POST['fabric_img_url']
        ]);
        header('Location: /fabrics');
        break;

    case '/do-pattern-update':
        $updatePattern = $patternModel->update($_POST['id'], [
            'fabric_id' => $_POST['fabric_id'],
            'pattern_nr' => $_POST['pattern_nr'],
            'company' => $_POST['company'],
            'collection' => $_POST['collection'],
            'season' => $_POST['season'],
            'recommended_fabrics' => $_POST['recommended_fabrics'],
            'pattern_img_url' => $_POST['pattern_img_url']
        ]);
        header('Location: /patterns');
        break;

    case '/do-fabric-delete':
        $deleteFabric = $fabricModel->delete($_GET['id']);
        header('Location: /fabrics');
        break;

    case '/do-pattern-delete':
        $deletePattern = $patternModel->delete($_GET['id']);
        header('Location: /patterns');
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Page not found';
        break;
}
