<?php
use App\Controllers\Controller;
use App\Database;
use App\Models\PatternModel;
use App\Models\FabricModel;

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

$patterns = $db->getAll('patterns');
$fabrics = $db->getAll('fabrics');
$stash = $db->fullJoin('fabrics', 'patterns', 'pattern_id');

// Routing
//$controller = new Controller($baseDir);

$url = $path($_SERVER['REQUEST_URI']);

switch ($url) {
    case '/':
        require $baseDir . '/views/index.php';
        break;
    case '/update':
        if (isset($_POST['delete'])) {
            $deleteFabric = $fabricModel->delete($_POST['id']);
            header('Location: /fabrics');
        } elseif (isset($_POST['update'])) {
            $updateFabric = $fabricModel->update($_POST['id'], [
                'category' => $_POST['category'],
                'composition' => $_POST['composition'],
                'pattern_id' => $_POST['pattern_id'],
                'fabric_img_url' => $_POST['fabric_img_url']
            ]);
            header('Location: /fabrics');
        } else {
            $oneFabric = $fabricModel->getById($_GET['id']);
            require $baseDir . '/views/update.php';
        }
        break;
    case '/create-fabric':
        if (empty($_POST)) {
            require $baseDir . '/views/create-fabric.php';
        } else {
            // $controller->createRecipe($recipeModel, $_POST);
            $fabricModel = new fabricModel($db);
            $fabricId = $fabricModel->create($_POST);
            header('Location:/fabrics');
        }
        break;
    case '/fabrics':
        if (empty($_GET)) {
            require $baseDir . '/views/fabrics.php';
        } elseif (isset($_GET['modify'])) {
            $oneFabric = $fabricModel->getById($_GET['id']);
            header('Location: /update?id=' . $_GET['id']);
        } else {
            $deleteFabric = $fabricModel->delete($_GET['id']);
            header('Location: /fabrics');
        }
        break;
    case '/patterns':
        require $baseDir . '/views/patterns.php';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Page not found';
        break;
}