<?php

require('../model/db.php');

require('./Horoscop.php');
require('./MovieController/KwExtractor.php');
require('./MovieController/Movie.php');
require('./CocktailController/Cocktail.php');
require('./MealController/Meal.php');

function registerEntries($zodiacId, $zodiacName) {

    global $db;
    
    // here will be the results of the differents API queries
    $save = [];
    
    // horoscop
    
    $horoscop = new Horoscop();
    
    $save['horoscop_desc'] = $horoscop->aggregate($zodiacName);
    $save['horoscop_scores'] = str_replace('\n', '', json_encode($horoscop->getQuantifiedHoroscop($zodiacId)));
    
    // movie
    
    $movie = new Movie($zodiacName);
    
    $movieInfos = $movie->getMovie();
    
    $save['movie_name'] = $movieInfos->title;
    $save['movie_desc'] = $movieInfos->overview;
    $save['movie_year'] = intval(substr($movieInfos->release_date, 0, 4));
    $save['movie_image'] = 'https://image.tmdb.org/t/p/w220_and_h330_face' . $movieInfos->poster_path;
    
    // cocktail
    
    $cocktail = new Cocktail();
    
    $cocktailInfos = $cocktail->getCocktail();
    
    $save['cocktail_name'] = $cocktailInfos->strDrink;
    
    $cocktailIngredients;
    
    // builds the ingredients list
    
    $i = 1;
    while ($i <= 15) {
        $property = 'strIngredient'.$i;
        if ($cocktailInfos->{$property} !== '') {
            $cocktailIngredients[] = $cocktailInfos->{$property};
        }
        $i++;
    }
    
    $save['cocktail_ingredients'] = json_encode($cocktailIngredients);
    $save['cocktail_recipe'] = $cocktailInfos->strInstructions;
    $save['cocktail_image'] = $cocktailInfos->strDrinkThumb;
    
    $meal = new Meal();
    
    $mealInfos = $meal->getMealsByRange();
    
    $save['recipe_name'] = $mealInfos->label;
    $save['recipe_ingredients'] = json_encode($mealInfos->ingredientLines);
    $save['recipe_image'] = $mealInfos->image;
    $save['recipe_link'] = $mealInfos->url;
    
    $save['recipe_calories'] = round($mealInfos->calories / $mealInfos->yield);

    // database insertion
    
    $req = $db->prepare('INSERT INTO '.$zodiacName.'(
        date,
        horoscop_desc,
        horoscop_scores,
        movie_name,
        movie_desc,
        movie_year,
        movie_image,
        cocktail_name,
        cocktail_ingredients,
        cocktail_image,
        cocktail_recipe,
        recipe_name,
        recipe_ingredients,
        recipe_image,
        recipe_link,
        recipe_calories
    ) VALUES (
        CURRENT_DATE,
        :horoscop_desc,
        :horoscop_scores,
        :movie_name,
        :movie_desc,
        :movie_year,
        :movie_image,
        :cocktail_name,
        :cocktail_ingredients,
        :cocktail_image,
        :cocktail_recipe,
        :recipe_name,
        :recipe_ingredients,
        :recipe_image,
        :recipe_link,
        :recipe_calories
    )');

    $req->execute($save);

    // echo '<pre>';
    // var_dump($save);
    // echo '</pre>';
    // exit;

}

$zodiacList = [
    'aries',
    'taurus',
    'gemini',
    'cancer',
    'leo',
    'virgo',
    'libra',
    'scorpio',
    'sagittarius',
    'capricorn',
    'aquarius',
    'pisces'
];

foreach ($zodiacList as $i => $zodiacSign) {
    registerEntries($i+1, $zodiacSign);
}