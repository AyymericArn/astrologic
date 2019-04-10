<?php

// namespace Controllers;

class Horoscop {

    private $test = [];

    public function __construct() {
        
    }

    // using AstrologyApi

    public static function getHoroscop($zodiacName) {
        // $zodiacSign = $_SESSION['userinfos']->zodiac;
        // $zodiacSign = 'aquarius';
        $zodiacSign = $zodiacName;

        $url = "http://json.astrologyapi.com/v1/sun_sign_prediction/daily/$zodiacSign";

        $cacheKey = md5($url);
        $cachePath = '../cache/'.$cacheKey;
        $hour = intval(date('G')) * 3600 + intval(date('i')) * 60 + intval(date('s'));


        if (file_exists($cachePath) && (time() - $hour) < filemtime($cachePath)) {

            $result = file_get_contents($cachePath);

            return json_decode($result);

        } else {
            $curl = curl_init();      
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_USERPWD, "604037:673415616a7edb3fad90d6dd81b565eb");
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
    
            curl_close($curl);

            file_put_contents($cachePath, $response);
            return json_decode($response);
        }
    }

    public static function aggregate($zodiacName) {
        $horoscop = self::getHoroscop($zodiacName);
        $fullText = (
            $horoscop->prediction->personal_life . ' ' .
            $horoscop->prediction->profession . ' ' .
            $horoscop->prediction->health . ' ' .
            $horoscop->prediction->travel . ' ' .
            $horoscop->prediction->luck . ' ' .
            $horoscop->prediction->emotions
        );

        return $fullText;
    }

    // using VediAstroAPI

    public static function getQuantifiedHoroscop($zodiac = 3) {
        // $zodiacSign = $_SESSION['userinfos']->zodiac;
        $url = 'https://api.vedicastroapi.com/json/prediction/daily?';
        $url .= http_build_query([
            'api_key' => '4657e46b-6e71-5788-b43e-2885cc5ce540',
            'zodiac' => $zodiac,
            'tz' => '5.5',
            'day' => 'today'
        ]);

        $cacheKey = md5($url);
        $cachePath = '../cache/'.$cacheKey;
        $hour = intval(date('G')) * 3600 + intval(date('i')) * 60 + intval(date('s'));

        if (file_exists($cachePath) && (time() - $hour) < filemtime($cachePath)) {

            $result = file_get_contents($cachePath);

            return json_decode($result)->response;

        } else {

            $curl = curl_init();      
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);

            curl_close($curl);

            file_put_contents($cachePath, $response);
            return json_decode($response)->response;
        }
    }
}

// $horoscop = new Horoscop();

// $horoscop->aggregate();