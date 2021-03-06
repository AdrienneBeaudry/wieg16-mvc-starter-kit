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

function isSelected($id, $toMatch){
    if(!is_array($toMatch)) $toMatch = [$toMatch];
    return (in_array($id, $toMatch)) ? 'selected="selected"' : '';
}

switch ($url) {
    case '/':
        require $baseDir . '/views/header.php';
        require $baseDir . '/views/nav.php';
        require $baseDir . '/views/index.php';
        require $baseDir . '/views/footer.php';
        break;

    case '/do-pairing-delete':
        $deletePairing = $pairingModel->deletePairing($_GET['fabric_id'], $_GET['pattern_id']);
        header('Location: /');
        break;

    case '/fabrics':
        $fabrics = $fabricModel->getAllOrder();

        require $baseDir . '/views/header.php';
        require $baseDir . '/views/nav.php';
        require $baseDir . '/views/fabrics.php';
        require $baseDir . '/views/footer.php';
        break;

    case '/patterns':
        $patterns = $patternModel->getAllOrder();

        require $baseDir . '/views/header.php';
        require $baseDir . '/views/nav.php';
        require $baseDir . '/views/patterns.php';
        require $baseDir . '/views/footer.php';
        break;

    case '/create':
        $fabrics = $fabricModel->getAll();
        $patterns = $patternModel->getAll();

        require $baseDir . '/views/header.php';
        require $baseDir . '/views/nav.php';
        require $baseDir . '/views/add-new.php';
        require $baseDir . '/views/footer.php';
        break;

    case '/save-new-pattern':
        $patternModel = new patternModel($db);
        $patternId = $patternModel->create([
            'pattern_nr' => $_POST['pattern_nr'],
            'company' => $_POST['company'],
            'collection' => $_POST['collection'],
            'recommended_fabrics' => $_POST['recommended_fabrics'],
            'season' => $_POST['season'],
            'img_url' => $_POST['img_url']
            ]);

        foreach ($_POST['paired'] as $paired) {
            $db->create('fabrics_patterns', ['pattern_id' => $patternId, 'fabric_id' => $paired]);
        }

        header('Location:/patterns');
        break;

    case '/save-new-fabric':
        $fabricModel = new fabricModel($db);
        $fabricId = $fabricModel->create([
            'category' => $_POST['category'],
            'composition' => $_POST['composition'],
            'amount_meter' => $_POST['amount_meter'],
            'img_url' => $_POST['img_url'],
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
        $patterns=$patternModel->getAll();
        $related = array_map(function($pattern) { return $pattern['id'];}, $db->getRelatedPatterns($_GET['id']));
        require $baseDir . '/views/header.php';
        require $baseDir . '/views/nav.php';
        require $baseDir . '/views/update-fabric.php';
        require $baseDir . '/views/footer.php';
        break;

    case '/update-pattern':
        $onePattern = $patternModel->getById($_GET['id']);
        $fabrics=$fabricModel->getAll();
        $related = array_map(function($fabric) { return $fabric['id'];}, $db->getRelatedFabrics($_GET['id']));
        require $baseDir . '/views/header.php';
        require $baseDir . '/views/nav.php';
        require $baseDir . '/views/update-pattern.php';
        require $baseDir . '/views/footer.php';
        break;

    case '/update-pairing':
        $onePattern = $patternModel->getById($_GET['pattern_id']);
        $fabrics=$fabricModel->getAll();
        $oneFabric = $fabricModel->getById($_GET['fabric_id']);
        $patterns=$patternModel->getAll();
        $related = array_map(function($fabric) { return $fabric['id'];}, $db->getRelatedFabrics($_GET['id']));

        require $baseDir . '/views/header.php';
        require $baseDir . '/views/nav.php';
        require $baseDir . '/views/update-pairing.php';
        require $baseDir . '/views/footer.php';
        break;

    case '/do-fabric-update':
        $updateFabric = $fabricModel->update($_POST['id'], [
            'category' => $_POST['category'],
            'composition' => $_POST['composition'],
            'amount_meter' => $_POST['amount_meter'],
            'img_url' => $_POST['img_url']
        ]);
        header('Location: /fabrics');
        break;

    case '/do-pattern-update':
        $updatePattern = $patternModel->update($_POST['id'], [
            'pattern_nr' => $_POST['pattern_nr'],
            'company' => $_POST['company'],
            'collection' => $_POST['collection'],
            'season' => $_POST['season'],
            'recommended_fabrics' => $_POST['recommended_fabrics'],
            'img_url' => $_POST['img_url']
        ]);

        $db->deleteRelated('fabrics_patterns', 'pattern_id', $_POST['id']);
        foreach ($_POST['paired'] as $paired) {
            $db->create('fabrics_patterns', ['pattern_id' => $_POST['id'], 'fabric_id' => $paired]);
        }

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
