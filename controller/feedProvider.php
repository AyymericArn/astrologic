<?php

require('../model/DataManager.php');

$getter = new DataManager($db);

$oldData = [];

for ($i=$daysbefore+1; $i < $daysbefore+11; $i++) { 
  $oldData[$i] = $getter->getOldData($zodiac, $i);
}

$i = $daysbefore;
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