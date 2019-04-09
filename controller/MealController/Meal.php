<?php

require('../Horoscop.php');

class Meal extends Horoscop {

    public function __construct() {
        # code...
    }

    public function defineHealthRange() {
        $healtScore = parent::getQuantifiedHoroscop()->health;

        $base = $healtScore * 20;
        $mod = $base % 100;
        $min = $base - $mod;
        $max = $min + 100;
    }    
}

$meal = new Meal();

$meal->defineHealthRange();