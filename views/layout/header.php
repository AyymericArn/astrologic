<header>
    <?php

    // var_dump($_SESSION['errors']);
    
    // Display error message
    if(isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) { ?>
        
        <div class="error"><?= $error ?></div>

    <?php }}
    $_SESSION['errors'] = [];

    if(isset($_SESSION['success'])) {
        foreach ($_SESSION['success'] as $success) { ?>
            
        <div class="success"><?= $success ?></div>

    <?php }}
    $_SESSION['success'] = []; ?>

    
</header>