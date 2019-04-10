<?php

session_start();

if (!isset($_POST['selector'])) {
    echo '<pre>';
    var_dump('proute');
    echo '</pre>';
    exit;
    $_SESSION['errors'][] = 'You must select a Zodiac sign !';
    header('Location: ../register');
}

$zodiac = $_POST['selector'] ?? false;
$mail = $_POST['mail'] ?? false;

$_SESSION['zodiac'] = $zodiac;
if ($mail && preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $mail)) {
    require('./subscribe.php');
}

header('Location: ../');