<?php

session_start();

require_once('../user/user.php');


$user = new user();
$user->setUsername($_POST["username"]);
$user->setFirstName($_POST["firstName"]);
$user->setLastName($_POST["lastName"]);
$user->setEmail($_POST['email']);
$user->setDateOfBirth($_POST['DOB']);
$user->setPassword($_POST["password"]);
$user->createUser(); 

?>