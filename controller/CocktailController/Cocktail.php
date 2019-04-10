<?php

require('../Horoscop.php');

class Cocktail extends Horoscop {

    private $ingredient;

    public function __construct() {
        $this->getIngredient();
    }

    public function getIngredient() {
        $healthScore = parent::getQuantifiedHoroscop()->health;

        $index;

        // choose an ingredient strenght range based on healthscore

        // if not already fetched cocktail
        if (true) {
            if ($healthScore <= 10) {
                $index = rand(0, 15);
            } else if ($healthScore <= 25) {
                $index = rand(16, 26);
            } else if ($healthScore <= 35) {
                $index = rand(27, 44);
            } else if ($healthScore <= 50) {
                $index = rand(45, 56);
            } else if ($healthScore <= 65) {
                $index = rand(57, 69);
            } else if ($healthScore <= 75) {
                $index = rand(70, 80);
            } else if ($healthScore <= 85) {
                $index = rand(81, 89);
            } else {
                $index = rand(90, 94);
            }
        } else {
            // get ingredient or index
        }


        $ingredients = json_decode(file_get_contents('./ingredients.json'));

        $this->ingredient = $ingredients[$index];
    }

    public function getCocktailList() {

        $ingredient = $this->ingredient;

        $url = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?";

        $url .= http_build_query([
            'i' => $ingredient
        ]);

        $cacheKey = md5($url);
        $cachePath = '../../cache/'.$cacheKey;
        $hour = intval(date('G')) * 3600 + intval(date('i')) * 60 + intval(date('s'));

        if (file_exists($cachePath) && (time() - $hour) < filemtime($cachePath)) {

            $result = file_get_contents($cachePath);

            return json_decode($result);

        } else {

            $curl = curl_init();      
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            
            curl_close($curl);

            $response = trim(
                $response,
                '<br />
                <b>Warning</b>:  mysqli::escape_string() expects parameter 1 to be string, array given in <b>C:\inetpub\thecocktaildb\includes\ez_sql_mysqli.php</b> on line <b>192</b><br />'
            );
            
            file_put_contents($cachePath, $response);
            
            $result = json_decode($response);

            return $result;
        }
    }

    public function getCocktail() {
        $list = $this->getCocktailList();

        $range = sizeof($list->drinks);

        $index = rand(0, $range - 1);
        $id = $list->drinks[$index]->idDrink;

        $url = "https://www.thecocktaildb.com/api/json/v1/1/lookup.php?";

        $url .= http_build_query([
            'i' => $id
        ]);

        $cacheKey = md5($url);
        $cachePath = '../../cache/'.$cacheKey;
        $hour = intval(date('G')) * 3600 + intval(date('i')) * 60 + intval(date('s'));

        if (file_exists($cachePath) && (time() - $hour) < filemtime($cachePath)) {

            $result = file_get_contents($cachePath);

            return json_decode($result)->drinks[0];

        } else {
            $curl = curl_init();      
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            
            curl_close($curl);

            
            file_put_contents($cachePath, $response);
            
            $result = json_decode($response);

            return $result->drinks[0];
        }
    }
}

// $cocktail = new Cocktail();

// $cocktail->getCocktail();