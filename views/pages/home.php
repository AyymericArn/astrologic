<?php

// var_dump($_SESSION['success']);

// use Controllers\CocktailController\Cocktail as Cocktail;

$cacheRoot = './';

// imports relevant classes


// Display success message


/*
require('partials/horoscope.php');
require('partials/cocktail.php');
require('partials/recipe.php');
require('partials/movie.php');
*/
?>


<?php

// require('../model/db.php');
require('../model/DataManager.php');

if (!isset($_COOKIE['zodiac'])) {
    setcookie('zodiac', $_SESSION['zodiac'], time() + 365*24*3600, null, null, false, true);
} else {
    $_SESSION['zodiac'] = $_COOKIE['zodiac'];
}

$getter = new DataManager($db);
$data = $getter->getData($_SESSION['zodiac']);
echo $_SESSION['zodiac'];
echo $data->horoscop_desc;
echo $data->horoscop_scores;
echo $data->movie_image;
echo $data->movie_name;
echo $data->movie_year;
echo $data->movie_desc;
echo $data->cocktail_image;
echo $data->cocktail_name;
echo $data->coctail_ingredients;
echo $data->cocktail_recipe;
echo $data->recipe_image;
echo $data->recipe_name;
echo $data->recipe_ingredients;
echo $data->recipe_link;

?>


<h2>Horoscope</h2>

<span id="horoscope">
    <img id="zodiacSign" src="public/img/zodiac-taurus.svg"  alt="Taurus sign"/>
    <div id="zodiacTitle"> Taurus </div>
    <img id="plusSign" src="public/img/+.png"  alt="+"/>
    <div id="horoscopeDescription">Luck and prosperity lie within your grasp now, Aquarius. The only problem is that you might not notice because you're so caught up in some emotional drama that occupies...</div>
</span>

<h2>Calendar</h2>

<div class="calendar">
    <div> 19 </div>
    <div> January </div>
    <img id="plusSign" src="public/img/+.png"  alt="+"/>
</div>
