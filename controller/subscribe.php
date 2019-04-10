<?php

require('../model/db.php');

$req = $db->prepare('INSERT INTO subscribers(sign, mail) VALUES (:sign, :mail)');

$req->execute([
    'sign' => $zodiac,
    'mail' => $mail
]);