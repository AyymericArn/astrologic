<?php

// var_dump($_SESSION['success']);

// use Controllers\CocktailController\Cocktail as Cocktail;

$cacheRoot = './';

// imports relevant classes
require('../controller/Horoscop.php');
require('../controller/CocktailController/Cocktail.php');
require('../controller/MealController/Meal.php');
require('../controller/MovieController/KwExtractor.php');
require('../controller/MovieController/Movie.php');

// Display success message
if(isset($_SESSION['success'])) {
    foreach ($_SESSION['success'] as $success) { ?>
        
    <div class="success"><?= $success ?></div>

<?php }}
$_SESSION['success'] = [];

$cocktail = new Cocktail();

echo '<pre>';
var_dump($cocktail->getCocktail());
echo '</pre>';
exit;

// page components
require('partials/horoscope.php');
require('partials/cocktail.php');
require('partials/recipe.php');
require('partials/movie.php');

?>
<div>Horoscope</div>
