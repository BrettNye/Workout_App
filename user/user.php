<?php
require_once('userDAO.php');

class User implements \JsonSerializable {
  // Properties
  private $user_id;
  private $username;
  private $first_name;
  private $last_name;
  private $password;
  private $email;
  private $date_of_birth;
  private $current_user_weight;
  private $user_goal;
  private $user_goal_weight;

  // Methods
  function __construct() {
  }
  function getUserId(){
    return $this->user_id;
  }
  function setUserId($user_id){
    $this->user_id = $user_id;
  }
  function getUsername() {
    return $this->username;
  }
  function setUsername($username){
    $this->username = $username;
  }
  function getFirstName() {
    return $this->first_name;
  }
  function setFirstName($first_name){
    $this->first_name = $first_name;
  }
  function getLastName() {
    return $this->last_name;
  }
  function setLastName($last_name){
    $this->last_name = $last_name;
  }

  function getPassword(){
    return $this->password;
  }

  function setPassword($password){
    $this->password = hash("sha256", $password);
  }

  function getEmail(){
    return $this->email;
  }

  function setEmail($email){
    $this->email = $email;
  }

  function getDateOfBirth(){
    return $this->date_of_birth;
  }

  function setDateOfBirth($DOB){
    $this->date_of_birth = $DOB;
  }

  function getUserWeight(){
    return $this->current_user_weight;
  }

  function setCurrentWeight($current_user_weight){
    $this->current_user_weight = $current_user_weight;
  }

  function getUserGoal(){
    return $this->user_goal;
  }

  function setUserGoal($user_goal){
    $this->user_goal = $user_goal;
  }

  function getUserGoalWeight(){
    return $this->user_goal_weight;
  }

  function setUserGoalWeight($user_goal_weight){
    $this->user_goal_weight = $user_goal_weight;
  }


  function getUserByID($user_id){
    $this->user_id = $user_id;
    $userDAO = new userDAO();
    $userDAO->getUser($this, 0);
    return $this;
  }

  function getUserByUsername($username){
    $this->username = $username;
    $userDAO = new userDAO();
    $userDAO->getUser($this, 1);
    return $this;
  }

  function getUserByFirstName($first_name){
    $this->first_name = $first_name;
    $userDAO = new userDAO();
    $userDAO->getUser($this, 2);
    return $this;
  }

  function getUserByLastName($last_name){
    $this->last_name = $last_name;
    $userDAO = new userDAO();
    $userDAO->getUser($this, 3);
    return $this;
  }

  function createUser(){
    $userDAO = new userDAO();
    $userDAO->createUser($this);
  }

  function deleteUser($username){
    $userDAO = new userDAO();
    $userDAO->deleteUser($username);
  }

  public function jsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
  }

  function checkLogin($username, $password){
    $userDAO = new userDAO();
    return $userDAO->checkLogin($username, $password);
  }

  function getUsersByUsername($username){
    $userDAO = new userDAO();
    return $userDAO->getUsersByUsername($username);
  }

  function getCurrentWeight($user_id){
    $userDAO = new userDAO;
    return $userDAO->getUserWeight($user_id);
  }

  function getCurrentCalories($user_id){
    $userDAO = new userDAO;
    return $userDAO->getUserCalories($user_id);
  }

  function getCurrentWater($user_id){
    $userDAO = new userDAO;
    return $userDAO->getUserWater($user_id);
  }

  function getWeightLog($user_id, $type){
    $userDAO = new userDAO;
    return $userDAO->getWeightLogData($user_id, $type);
  }

  function getCalorieLog($user_id, $type){
    $userDAO = new userDAO;
    return $userDAO->getCalorieLogData($user_id, $type);
  }

  function getWaterLog($user_id, $type){
    $userDAO = new userDAO;
    return $userDAO->getWaterLogData($user_id, $type);
  }
}
?>