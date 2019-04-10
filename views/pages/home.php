<?php

// var_dump($_SESSION['success']);

// Display success message
if($_SESSION['success']) {
    foreach ($_SESSION['success'] as $success) { ?>
        
    <div class="success"><?= $success ?></div>

<?php }}
$_SESSION['success'] = [];

/*
require('partials/horoscope.php');
require('partials/cocktail.php');
require('partials/recipe.php');
require('partials/movie.php');
*/
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
