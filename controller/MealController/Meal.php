<?php

require('../Horoscop.php');

class Meal extends Horoscop {

    private $min;
    private $max;

    public function __construct() {
        $this->defineHealthRange();
    }

    public function defineHealthRange() {
        $healthScore = parent::getQuantifiedHoroscop()->health;

        $base = $healthScore * 20;
        $mod = $base % 100;
        $min = $base - $mod;
        $max = $min + 100;

        $this->min = $min;
        $this->max = $max;
    }

    public function getMealsByRange() {

        $min = $this->min;
        $max = $this->max;

        $url = "https://api.edamam.com/search?";

        $url .= http_build_query([
            'app_id' => '17ecea6a',
            'app_key' => '71e86611ea6e3ed60fa7bb5b80446706',
            'calories' => "$min-$max",
            'q' => 'dish'
        ]);

        $cacheKey = md5($url);
        $cachePath = '../../cache/'.$cacheKey;
        $hour = intval(date('G')) * 3600 + intval(date('i')) * 60 + intval(date('s'));

        if (file_exists($cachePath) && (time() - $hour) < filemtime($cachePath)) {

            $result = file_get_contents($cachePath);

            return json_decode($result)->hits[0];

        } else {

            $curl = curl_init();      
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            
            curl_close($curl);
            
            file_put_contents($cachePath, $response);
            
            $result = json_decode($response);
            // shall be randomized
            return $result->hits[0];
        }
    }
}

// $meal = new Meal();

// echo '<pre>';
// var_dump($meal->getMealsByRange());
// echo '</pre>';
// exit;