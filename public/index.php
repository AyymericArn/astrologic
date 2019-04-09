<?php

require '../vendor/autoload.php';
require '../model/db.php';

// buffer init
ob_start();

// CHANGE FOR PROD
$uri = substr($_SERVER['REQUEST_URI'], 17);

$router = new App\Router($_GET['url']);

// is user login ?
if (!isset($_SESSION['connected'])) {
    $_SESSION['connected'] = false;
}

// routing

$router->get('/', function () {
    if ($_SESSION['connected']) {
        require('../views/pages/home.php');        
    } else {
        header('Location: ./connect');        
    }
});

$router->get('/connect', function () {
    require('../views/pages/connect.php');
});

$router->get('/register', function () {
    require('../views/pages/register.php');
});

$router->get('/register', function () {
    require('../views/pages/register.php');
});

$router->get('/calendar', function () {
    if ($_SESSION['connected']) {
        require('../views/pages/calendar.php');        
    } else {
        header('Location: ./connect');        
    }
});
$router->get('/favorite', function () {
    if ($_SESSION['connected']) {
        require('../views/pages/favorite.php');        
    } else {
        header('Location: ./connect');        
    }
});

$router->post('/controller/register', function () {
    echo 'posted';
});
$router->post('/controller/connect', function () {
    echo 'posted';
});

$router->run();

















// $router = new AltoRouter();
// $router->setBasePath('/public/');

// $router->map('GET', '/', function () {
//     // require('../views/home.php');
//     echo 'heeeey';
// });
// $router->map('GET', '/index', function () {
//     // require('../views/home.php');
//     echo 'heeeey';
// });

// $router->map('GET', '/contact', function () {
//     // require('../views/home.php');
//     echo 'contact';
// });

// $match = $router->match();
// // if ($match !== null) {
// //     $match['target']();
// // }

// echo '<pre>';
// var_dump($match);
// echo '</pre>';

// buffer unload
$content = ob_get_clean();

// header('Content-Type: text/html');
include('../views/template.php');