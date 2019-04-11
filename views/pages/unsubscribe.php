<?php

// unsubscribe

$req = $db->exec("DELETE FROM subscribers WHERE hash='$hash'");
?>

<head>
    <link rel="stylesheet" href="../public/css/main.css">
</head>

<div class="main_unsub">
    <img src="../public/img/astrologic.png" class="logo">
    <h1 class="title">Astrologic</h1>
    <p class="message">You’ve succesfully unsubscribed our mail services<p>
    <p class="message"> :( </p>
</div>
<p class="footer_text">We hope to see you later !</p>