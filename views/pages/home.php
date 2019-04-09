<?php

// var_dump($_SESSION['success']);

// Display success message
if($_SESSION['success']) {
    foreach ($_SESSION['success'] as $success) { ?>
        
    <div class="success"><?= $success ?></div>

<?php }}
$_SESSION['success'] = [];

require('partials/horoscope.php');
require('partials/cocktail.php');
require('partials/recipe.php');
require('partials/movie.php');

?>
<div>home</div>