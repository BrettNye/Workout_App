<?php
require_once('../user/userDAO.php');
session_start();
$userDAO = new userDAO;
$userDAO->addUserWater($_SESSION['user_id'], $_POST['water']);
header('Location: ../user_stats.php?weight=' . $_GET['weight'] . "&calorie=" . $_GET['calorie'] . "&water=" . $_GET['water']);