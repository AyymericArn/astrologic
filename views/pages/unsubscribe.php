<?php

// unsubscribe

$req = $db->exec("DELETE FROM subscribers WHERE hash='$hash'");

?>

<p>you successfully unsubscribed from daily recommandation.</p>