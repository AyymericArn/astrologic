<?php

class Horoscop {

    private $test = [];

    public function __construct() {
        
    }

    // using AstrologyApi

    public static function getHoroscop() {
        // $zodiacSign = $_SESSION['userinfos']->zodiac;
        $zodiacSign = 'aquarius';

        $curl = curl_init();      
        curl_setopt($curl, CURLOPT_URL, "http://json.astrologyapi.com/v1/sun_sign_prediction/daily/$zodiacSign");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERPWD, "604037:673415616a7edb3fad90d6dd81b565eb");
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }

    public static function aggregate() {
        $horoscop = self::getHoroscop();
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

        $curl = curl_init();      
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response)->response;
    }
}

// $horoscop = new Horoscop();

// $horoscop->getQuantifiedHoroscop();