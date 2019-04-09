<?php

// using AstrologyApi

class Horoscop {

    private $test = [];

    public function __construct() {
        
    }

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
}

// $horoscop = new Horoscop();

// $horoscop->aggregate();