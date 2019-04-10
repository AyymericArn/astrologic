<?php

session_start();

if (!isset($_POST['selector'])) {
    $_SESSION['errors'][] = 'You must select a Zodiac sign !';
    header('Location: ../register');
    exit;
}

$zodiac = $_POST['selector'] ?? false;
$mail = $_POST['mail'] ?? false;

if ($mail && $mail !== '') {
    if (preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $mail)) {
        $_SESSION['zodiac'] = $zodiac;
        require('./subscribe.php');
    } else {
        $_SESSION['errors'][] = 'you entered a wrong mail adress';
        header('Location: ../register');
        exit;
    }
} else {
    $_SESSION['zodiac'] = $zodiac;
}

header('Location: ../');