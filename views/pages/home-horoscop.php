<?php

require('../model/DataManager.php');

if (!isset($_COOKIE['zodiac'])) {
    setcookie('zodiac', $_SESSION['zodiac'], time() + 365*24*3600);
} else {
    $_SESSION['zodiac'] = $_COOKIE['zodiac'];
}

$getter = new DataManager($db);
$data = $getter->getData($_SESSION['zodiac']);

// horoscop scores

$scores = json_decode($data->horoscop_scores, true);
arsort($scores);

for ($i=0; $i < 6; $i++) { 
    array_pop($scores);
}

$scoresTags = array_keys($scores);

// fetch previous days datas

$oldData = [];
for ($i=1; $i < 11; $i++) { 
  $oldData[$i] = $getter->getOldData($_SESSION['zodiac'], $i);
}

?>
  
<!-- menu -->
<div class="header_home">
    <img class="menu_home" src="public/img/menu.svg" alt="">
    <img class="logo_home" src="public/img/astrologic.png" alt="">
</div>

<!-- horoscope -->
<h1>Horoscope</h1>
<div class="horoscope">
  <div class="header_horoscope">
    <div class="title">
      <img src="public/img/zodiac-aquarius.svg" alt="zodiac sign aquarius">
      <div class="title_horoscope"><?= ucfirst($_SESSION['zodiac']) ?></div>
    </div>
    <div class="button_horoscope">+</div>
  </div>
  <div class="text_horoscope">
    <p><?= $data->horoscop_desc ?></p>
  </div>

  <!-- add infos onclick -->
  <div class="text_horoscope horoscope_more">
    <p>Luck and prosperity lie within your grasp now, Aquarius. The only problem is that you might not notice because you're so caught up in some emotional drama that occupies...</p>
    <div class="horoscope_rating">
      <p><?= $scores[$scoresTags[0]] ?></p>    
      <div class="health"><?= $scoresTags[0] ?></div>
      <p><?= $scores[$scoresTags[1]] ?></p>    
      <div class="health"><?= $scoresTags[1] ?></div>
    </div>
  </div>
</div>

<!-- movie -->
<div class="your_movie">
  <div class="header_movie">
    <h1>Your Movie</h1>
    <img src="public/img/star.svg" alt="">
  </div>
  <div class="content_movie">
    <img src="<?= $data->movie_image ?>" alt="">
    <div class="title_movie">
      <div class="title_movie_header">
        <h3><?= $data->movie_name ?></h3>
        <p><?= $data->movie_year ?></p>
      </div>
      <p class="description"><?= $data->movie_desc ?></p>
      <a href="">Watch Movie</a>
    </div>
  </div>
</div>

<!-- cocktail -->
<div class="your_cocktail">
  <div class="header_cocktail">
    <h1>Your Cocktail</h1>
    <img src="public/img/star.svg" alt="">
  </div>
  <div class="content_cocktail">
    <img src="<?= $data->cocktail_image ?>" alt="">
    <div class="title_cocktail">
      <div class="title_cocktail_header">
        <h3><?= $data->cocktail_name ?></h3>
      </div>
      <ul class="ingredients_cocktail">
        <?php foreach (json_decode($data->cocktail_ingredients) as $ingredient): ?>
          <li><?= $ingredient ?></li>
        <?php endforeach; ?>
      </ul>
      <p class="see_recipe">+</p>
    </div>
  </div>
  <div class="hidden_recipe">
       <p><?= $data->cocktail_recipe ?></p>
  </div>
</div>

<!-- recipe -->
<div class="your_recipe">
  <div class="header_recipe">
    <h1>Your recipe</h1>
    <img src="public/img/star.svg" alt="">
  </div>
  <div class="content_recipe">
    <img src="<?= $data->recipe_image ?>" alt="<?= $data->recipe_name ?>">
    <div class="title_recipe">
      <div class="title_recipe_header">
        <h3><?= $data->recipe_name ?></h3>
        <p><?= $data->recipe_calories ?>kcal</p>
      </div>
      <p class="description">
      <?php foreach (json_decode($data->recipe_ingredients) as $ingredient): ?>
        <li><?= $ingredient ?></li>
      <?php endforeach; ?>
      </p>
      <a href="<?= $data->recipe_link ?>">See recipe</a>
    </div>
  </div>
</div>

<!-- calendar  -->
<h1>Calendar</h1>

<?php
$i = 0;
foreach ($oldData as $dayData):  
?>

<div class="vignette<?= $i > 0 ? ' vignette_'.$i % 4 : ''; ?>">
  <div class="show">
    <div class="title">
      <div class="date"><?= date('j', (time() - 86400*$i)); ?></div>
      <div class="month"><?= date('M', (time() - 86400*$i)); ?></div>
    </div>
    <div class="button">+</div>
  </div>
  <div class="infos">
    <div class="info-row info-row-1">
        <p class="movie">Movie</p>
        <p class="movie_name"><?= $dayData->movie_name ?? 'no data yet' ?></p>
    </div>
    <div class="info-row info-row-2">
        <p class="cocktail">Cocktail</p>
        <p class="cocktail_name"><?= $dayData->cocktail_name ?? 'no data yet' ?></p>
    </div>
    <div class="info-row info-row-3">
        <p class="recipe">Recipe</p>
        <p class="recipe_name"><?= $dayData->recipe_name ?? 'no data yet' ?></p>
    </div>
  </div>
</div>

<?php
$i++;
endforeach;
?>

<!--
<div class="vignette">
  <div class="show">
    <div class="title">
      <div class="date"><?= date('j', (time() - 86400*1)) ?></div>
      <div class="month"><?= date('M', (time() - 86400*1)) ?></div>
    </div>
    <div class="button">+</div>
  </div>
  <div class="infos">
    <div class="info-row info-row-1">
        <p class="movie">Movie</p>
        <p class="movie_name"><?= $oldData[1]->movie_name ?></p>
    </div>
    <div class="info-row info-row-2">
        <p class="cocktail">Cocktail</p>
        <p class="cocktail_name"><?= $oldData[1]->cocktail_name ?></p>
    </div>
    <div class="info-row info-row-3">
        <p class="recipe">Recipe</p>
        <p class="recipe_name"><?= $oldData[1]->recipe_name ?></p>
    </div>
  </div>
</div>
<div class="vignette vignette_1">
  <div class="show">
    <div class="title">
      <div class="date"><?= date('j', (time() - 86400*2)) ?></div>
      <div class="month"><?= date('M', (time() - 86400*2)) ?></div>
    </div>
    <div class="button">+</div>
  </div>
  <div class="infos">
    <div class="info-row info-row-1">
        <p class="movie">Movie</p>
        <p class="movie_name"><?= $oldData[2]->movie_name ?></p>
    </div>
    <div class="info-row info-row-2">
        <p class="cocktail">Cocktail</p>
        <p class="cocktail_name"><?= $oldData[2]->cocktail_name ?></p>
    </div>
    <div class="info-row info-row-3">
        <p class="recipe">Recipe</p>
        <p class="recipe_name"><?= $oldData[2]->recipe_name ?></p>
    </div>
  </div>
</div>  
<div class="vignette vignette_2">
  <div class="show">
    <div class="title">
      <div class="date"><?= date('j', (time() - 86400*3)) ?></div>
      <div class="month"><?= date('M', (time() - 86400*3)) ?></div>
    </div>
    <div class="button">+</div>
  </div>
  <div class="infos">
    <div class="info-row info-row-1">
        <p class="movie">Movie</p>
        <p class="movie_name"><?= $oldData[3]->movie_name ?></p>
    </div>
    <div class="info-row info-row-2">
        <p class="cocktail">Cocktail</p>
        <p class="cocktail_name"><?= $oldData[3]->cocktail_name ?></p>
    </div>
    <div class="info-row info-row-3">
        <p class="recipe">Recipe</p>
        <p class="recipe_name"><?= $oldData[3]->recipe_name ?></p>
    </div>
  </div>
</div>  
<div class="vignette vignette_3">
  <div class="show">
    <div class="title">
      <div class="date"><?= date('j', (time() - 86400*4)) ?></div>
      <div class="month"><?= date('M', (time() - 86400*4)) ?></div>
    </div>
    <div class="button">+</div>
  </div>
  <div class="infos">
    <div class="info-row info-row-1">
        <p class="movie">Movie</p>
        <p class="movie_name"><?= $oldData[4]->movie_name ?></p>
    </div>
    <div class="info-row info-row-2">
        <p class="cocktail">Cocktail</p>
        <p class="cocktail_name"><?= $oldData[4]->cocktail_name ?></p>
    </div>
    <div class="info-row info-row-3">
        <p class="recipe">Recipe</p>
        <p class="recipe_name"><?= $oldData[4]->recipe_name ?></p>
    </div>
  </div>
</div>  
<div class="vignette">
  <div class="show">
    <div class="title">
      <div class="date"><?= date('j', (time() - 86400*5)) ?></div>
      <div class="month"><?= date('M', (time() - 86400*5)) ?></div>
    </div>
    <div class="button">+</div>
  </div>
  <div class="infos">
    <div class="info-row info-row-1">
        <p class="movie">Movie</p>
        <p class="movie_name"><?= $oldData[5]->movie_name ?></p>
    </div>
    <div class="info-row info-row-2">
        <p class="cocktail">Cocktail</p>
        <p class="cocktail_name"><?= $oldData[5]->cocktail_name ?></p>
    </div>
    <div class="info-row info-row-3">
        <p class="recipe">Recipe</p>
        <p class="recipe_name"><?= $oldData[5]->recipe_name ?></p>
    </div>
  </div>
</div>
 -->