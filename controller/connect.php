<?php

session_start();

require('../model/db.php');
require('../model/MembersManager.php');

$membersManager = new MembersManager($db);



if ($membersManager->findMember($_POST)) {

    $_SESSION['success'][] = 'Connected!';
    $_SESSION['connected'] = true;

    $_SESSION['userinfos'] = $membersManager->findMember($_POST);
    
    print_r($_SESSION['userInfos']);
    
    header('Location: ../');
    exit;
} else {
    
    $_SESSION['errors'][] = 'There is no user matching with your password';

    header('Location: ../connect');
    exit;
};




