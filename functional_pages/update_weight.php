<?php
    require_once('../user/userDAO.php');
    session_start();
    echo $_POST['weight'];
    $userDAO = new userDAO;
    //Updates user Weight AND Creates User Weight Log Entry
    $userDAO->UpdateUserWeight($_SESSION['user_id'], $_POST['weight']);
    header('Location: ../user_stats.php?weight=' . $_GET['weight'] . "&calorie=" . $_GET['calorie'] . "&water=" . $_GET['water']);
?>