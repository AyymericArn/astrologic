<?php

require '../vendor/autoload.php';
require '../model/db.php';

// starts session

session_start();

// buffer init
ob_start();

// CHANGE FOR PROD
$uri = substr($_SERVER['REQUEST_URI'], 17);

$router = new App\Router($_GET['url']);

$hasZodiac = isset($_SESSION['zodiac']) || isset($_COOKIE['zodiac']);

// routing

$router->get('/', function () {
    global $hasZodiac;
    if ($hasZodiac) {
        global $db;
        require('../views/pages/home.php');
    } else {
        header('Location: ./select'); 
        exit;       
    }
});

// $router->get('/connect', function () {
//     require('../views/pages/connect.php');
// });

$router->get('/register', function () {
    require('../views/pages/register.php');
});

// change when it's good
$router->get('/select', function () {
    require('../views/pages/register.php');
});

$router->get('/calendar', function () {
    if (isset($_SESSION['zodiac'])) {
        require('../views/pages/calendar.php');        
    } else {
        header('Location: ./select'); 
        exit;       
    }
});
// $router->get('/favorite', function () {
//     if ($_SESSION['sign']) {
//         require('../views/pages/favorite.php');        
//     } else {
//         header('Location: ./select');  
//         exit;      
//     }
// });

// $router->get('/account', function () {
//     if ($_SESSION['connected']) {
//         require('../views/pages/account.php');        
//     } else {
//         header('Location: ./account');  
//         exit;      
//     }
// });

// change when it's good
$router->get('/unsubscribe/:hash', function ($hash) {
    global $db;
    require('../views/pages/unsubscribe.php');
});

$router->get('/home_horoscop', function () {
    if ($_SESSION['connected']) {
        require('../views/pages/home-horoscop.php');        
    } else {
        header('Location: ./home_horoscop');  
        exit;      
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