<?php

require('../model/db.php');

$check = $db->query("SELECT * FROM subscribers WHERE mail='$mail'");
$result = $check->fetch();

if (!$result) {
    $req = $db->prepare('INSERT INTO subscribers(sign, mail) VALUES (:sign, :mail)');
    
    $req->execute([
        'sign' => $zodiac,
        'mail' => $mail,
        'hash' => md5($mail)
    ]);
} else {
    $_SESSION['errors'][] = 'Your already subscribed to the daily recommandations !';
}