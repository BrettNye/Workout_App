<?php
    require_once('../user/userDAO.php');
    session_start();
    $userDAO = new userDAO;
    $userDAO->addUserCalories($_SESSION['user_id'], $_POST['calories']);
    header('Location: ../user_stats.php?weight=' . $_GET['weight'] . "&calorie=" . $_GET['calorie'] . "&water=" . $_GET['water']);
?>