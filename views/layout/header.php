<header>
    <?php

    // var_dump($_SESSION['errors']);
    
    // Display error message
    if(isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) { ?>
        
        <div class="error"><?= $error ?></div>

    <?php }}
    $_SESSION['errors'] = [] ?>

    
</header>