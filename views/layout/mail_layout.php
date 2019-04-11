<?php

// compute scores

$scores = json_decode($data->horoscop_scores, true);
arsort($scores);

for ($i=0; $i < 6; $i++) { 
    array_pop($scores);
}
$scoresTags = array_keys($scores);
$score0 = $scores[$scoresTags[0]];
$score1 = $scores[$scoresTags[1]];

$cIngredients = json_decode($data->cocktail_ingredients);
$cIngList = '';
$rIngredients = json_decode($data->recipe_ingredients);
$rIngList = '';

foreach ($cIngredients as $ingredient):
    $ingredient !== '' ? $cIngList .= "<li>$ingredient</li>" : '';
endforeach;

foreach ($rIngredients as $ringredient):
    $rIngList .= "<li>$ringredient</li>";
endforeach;

// $url = 'localhost/hetic/astrologic/unsubscribe/'.md5($subscriber->mail);

$mailContent = (
"<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <link rel=\"stylesheet\" href=\"./style.css\">
    <style>
        .category-1{
            float: left;
            margin-left: 20%;
            font-family: 'MontSerrat', sans-serif;
        }
        .category-2{
            float: right;
            margin-right: 20%;
            font-family: 'MontSerrat', sans-serif;
        }

        .circle-1{
        
        margin-top: 70px;
        margin-left: 20%;
        }

        .circle-1 span {
            margin-left: 27px;
            font-family: 'MontSerrat', sans-serif;
            color: #889AFE;
        }

        .circle-2{
            float: right;
            margin-right: 19.8%;
            position: relative;
            bottom: 18px;
        }

        .circle-2 {
            font-family: 'MontSerrat', sans-serif;
            color: #889AFE;
        }

        .hello{
            margin-top: 30px;
            margin-left: 30px;
            font-family: 'MontSerrat', sans-serif;
        }

        .clearBoth {
            clear: both;
        }


        .zodiac-sign{
            float: left;
            width: 70px;
            height: 70px;
            margin-left: 20px;
            margin-top: 5px;
        }

        .zodiac-name{
            font-family:'Capriola', sans-serif ;
            color: #444C76;
            font-size: 25px;
            margin-top: 18px;
            margin-right: 180px;
            margin-left: 30px;
            margin-bottom: 0px;
        }

        .title
        {
            font-family:'Capriola', sans-serif ;
            color: #444C76;
        }

        .daily-score{
            margin-left: 30px;
            font-family:'Capriola', sans-serif ;
            color: #444C76;
        }



        .social{
            float: right;
            margin-right: 30px
        }

        .unsubscribe{
            float: left;
            color: #B0B0B0;
            font-size: 12px;
            margin-left: 25px;
        }


        .card-type-text-horoscope
        {
            
            background-color: #F5F5F5;
            margin-top: 30px;
            margin-right: 25px;
            margin-bottom: 25px;
            margin-left:25px ;
            border-left: 4px solid #889AFE;
            padding: 10px;
        }

        .card-type-text-movie
        {
            
            background-color: #F5F5F5;
            margin: 25px;
            border-left: 4px solid #67D5DC;
            padding: 10px;
        }

        .card-type-list-cocktail
        {
            
            background-color: #F5F5F5;
            margin: 25px;
            border-left: 4px solid #F080A6;
            padding: 10px;
        }

        .card-type-list-recipe
        {
            
            background-color: #F5F5F5;
            margin: 25px;
            border-left: 4px solid #FECF58;
            padding: 10px;
        }


        .card-title
        {
            font-family: 'Capriola', sans-serif;
            font-size: 12px;
            color: #444C76;
            margin: 3px 0 20px 7px;
        }

        .card-title b
        {
            font-family: 'MontSerrat', sans-serif;
            font-weight: bold;
        }

        .card-description
        {
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            margin: 7px 16px 15px 32px;
            max-width: 300px;
        }

        .card-list
        {
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            margin: 9px 0 0 6px;
        }

        .card-list-left
        {
            float: left;
            margin-right: 50px;
        }

        .card-list li
        {
            padding-bottom: 2px;
        }

        .card-knowmore
        {
            margin-left: 240px;
            font-size: 9px;
            font-family: 'MontSerrat', sans-serif;
        }

        .card-knowmore p
        {
            display: inline-block;
            margin: 0 0 3px 0;
        }

        .card-knowmore img
        {
            display: inline-block;
            vertical-align: top;
            height: 9px;
        }


        .knowmore-1
        {
            margin-top: -13px;
            margin-left: 250px;
            font-size: 9px;
            font-family: 'MontSerrat', sans-serif;
        }
        .arrow-right-1
        {
            margin-top: 30px;
            margin-left: 238px;    
            height: 9px;
        }
    </style>
    <title>mail</title>
</head>
<body>
    <h1 class=\"title\">Astrologic</h1>

    <p class=\"daily-score\">Your daily score</p>
    <div class=\"category\">
        <p class=\"category-1\">Vitality</p>
        <p class=\"category-2\">Health</p>
    </div>

    <div class=\"circle-1\">
        <span>$score0%</span>
        <div class=\"slice\">
            <div class=\"bar\"></div>
            <div class=\"fill\"></div>
        </div>
    </div> 
    <div class=\"circle-2\">
        <span>$score1%</span>
        <div class=\"slice\">
            <div class=\"bar\"></div>
            <div class=\"fill\"></div>
        </div>
    </div>
    
    <p class=\"hello\">Hello, here are your daily recommendations.</p>
    <div class=\"zodiac\">
        <p class=\"zodiac-name\">$zodiacSign</p>
    </div>

    <div class=\"card-type-text-horoscope\">
            <p class=\"card-title\">Horoscope</p>
            <p class=\"card-description\">$data->horoscop_desc</p>
            <div class=\"card-knowmore\">
                <img class=\"arrow-right\" src=\"./img/arrow-right.png\" alt=\"\">
                <p>Know more</p>
            </div>
        </div>
    
        <div class=\"card-type-list-cocktail\">
            <p class=\"card-title\">Cocktail : <b>$data->cocktail_name</b></p>
            <ul class=\"card-list\">
                <div class=\"card-list-left\">
                    $cIngList
                </div>
            </ul>
            <div class=\"clearBoth\"></div>
            <div class=\"card-knowmore recipe\">
                <img class=\"arrow-right\" src=\"./img/arrow-right.png\" alt=\"\">
                <p>Know more</p>
            </div>
        </div>
    
        <div class=\"card-type-list-recipe\">
                <p class=\"card-title\">Recipe : <b>$data->recipe_name</b></p>
                <ul class=\"card-list\">
                    <div class=\"card-list-left\">
                        $rIngList
                    </div>    
                    <div class=\"clearBoth\"></div>  
                </ul>
                <div>
                    <img class=\"arrow-right-1\" src=\"./img/arrow-right.png\" alt=\"\">
                    <p class=\"knowmore-1\">Know more</p>
                </div>
            </div>
    
            <div class=\"card-type-text-movie\">
                <p class=\"card-title\">Movie : <b>$data->movie_name</b></p>
                <p class=\"card-description\">$data->movie_desc</p>
                <div class=\"card-knowmore\">
                    <img class=\"arrow-right\" src=\"./img/arrow-right.png\" alt=\"\">
                    <p>Know more</p>
                </div>
            </div>
    
    <footer>
        <a href=\"URLGOESHERE\" class=\"unsubscribe\">Unsubscribe</a>
        <div class=\"social\">
            <span class=\"facebook\">facebook</span>
            <span class=\"instagram\">instagram</span>
            <span class=\"twitter\">twitter</span>
        </div>
    </footer>
</body>

</html>");