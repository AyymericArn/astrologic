<?php

session_start();

require('../model/db.php');
require('../model/MembersManager.php');

$membersManager = new MembersManager($db);



if ($membersManager->findMember($_POST)) {

    $_SESSION['success'] = 'Connected!';
    $_SESSION['connected'] = true;

    $_SESSION['userinfos'] = $membersManager->findMember($_POST);
    
    print_r($_SESSION['userInfos']);
    
    header('Location: ../');

} else {
    
    $_SESSION['errors'][] = 'User not found';
    header('Location: ../connect');

};

// Check if user haved filled inputs

    # code...
    // Check if username and password exists
    
        // They do : grant access
        
        // They don't : do not grant access


