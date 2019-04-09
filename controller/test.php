<?php

$hour = intval(date('G')) * 3600 + intval(date('i')) * 60 + intval(date('s'));

if ((time() - $hour) > filemtime()) {
    # code...
}

echo '<pre>';
var_dump(time() - $hour);
echo '</pre>';

echo '<pre>';
var_dump(filemtime('./register.php'));
echo '</pre>';
