<?php
date_default_timezone_set('America/Denver');
class UserDAO{

    function createUser($user){
      require_once('../utilities/connection.php');

      $sql = "INSERT INTO user (username, first_name, last_name, password, email, date_of_birth)
              VALUES
              ('" . $user->getUsername() . "',
              '" . $user->getFirstName() . "',
              '" . $user->getLastName() . "',
              '" . $user->getPassword() . "',
              '" . $user->getEmail() . "', " 
              . $user->getDateOfBirth() . ")";

      if ($conn->query($sql) === TRUE) {
        echo "user created";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
          
      $conn->close();
    }

    function checkLogin($passedinusername, $passedinpassword){
        require_once('../utilities/connection.php');
    
        $user_id = 0;
        $sql = "SELECT user_id FROM user WHERE username = '" . $passedinusername . "' AND password = '" . hash("sha256", trim($passedinpassword)) . "'";
    
        $result = $conn->query($sql);
        
    
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $user_id = $row["user_id"];
          }
        }
        else {
            echo "0 results";
        }
        $conn->close();
        return $user_id;
      }

    function getUsersByUsername($username){
      include('../getgains/utilities/connection.php');

      $sql = "SELECT * FROM user WHERE username LIKE " . $username;

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $listofusers[] = 0;
          $user = new user;
          $user->setUserId($row['user_id']);
          $user->setUsername($row["username"]);
          array_push($listofusers, $user);
        }
      }
      else {
          echo "0 results";
      }
      $conn->close();
      return $listofusers;
    }

    function UpdateUserWeight($user_id, $weight){
      require_once('../utilities/connection.php');

      $sql = "UPDATE user SET current_user_weight = $weight WHERE user_id = " . $user_id;

      $result = $conn->query($sql);

      if ($conn->query($sql) === TRUE) {
        echo "weight updated";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $sql = "INSERT INTO weight_log (user_id, weight, current_weight, weight_log_date)
      VALUES
      ( " . $user_id . ", " . $weight . ", true, SYSDATE())
      ON DUPLICATE KEY UPDATE weight = $weight";

      if ($conn->query($sql) === TRUE) {
        echo "weight log created";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
                
      $conn->close();
    }

    function getUserWeight($user_id){
      include('../getgains/utilities/connection.php');

      $sql = "SELECT current_user_weight FROM user WHERE user_id = " . $user_id;
      
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $current_user_weight = $row["current_user_weight"];
        }
      }
      else {
          echo "0 results";
      }
      $conn->close();
      return $current_user_weight;
    }

    function getUserCalories($user_id){
      include('../getgains/utilities/connection.php');

      $sql = "SELECT calorie FROM calorie_log WHERE user_id =". $user_id . " ORDER BY calorie_log_date DESC LIMIT 1";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $calories = $row["calorie"];
        }
      }
      else {
          echo "0 results";
      }
      $conn->close();
      return $calories;
    }

    function getUserWater($user_id){
      include('../getgains/utilities/connection.php');

      $sql = "SELECT water FROM water_log WHERE user_id = " . $user_id . " ORDER BY water_log_date DESC LIMIT 1";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $water = $row["water"];
        }
      }
      else {
          echo "0 results";
      }
      $conn->close();
      return $water;
    }

    function getWeightLogData($user_id, $time){
      require_once('../getgains/utilities/connection.php');

      switch($time){
        case 0: $sql = "SELECT weight, weight_log_date FROM weight_log WHERE user_id = " . $user_id . " ORDER BY weight_log_date DESC LIMIT 7";
          break;
        case 1: $sql = "SELECT weight, weight_log_date FROM weight_log WHERE user_id = " . $user_id . " ORDER BY weight_log_date DESC LIMIT 30";
          break;
        case 2: $sql = "SELECT weight, weight_log_date FROM weight_log WHERE user_id = " . $user_id . " ORDER BY weight_log_date DESC LIMIT 183";
          break;
        case 3: $sql = "SELECT weight, weight_log_date FROM weight_log WHERE user_id = " . $user_id . " ORDER BY weight_log_date DESC LIMIT 365";
      }

      $result = $conn->query($sql);
    

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $weights[] = $row["weight"];
            $dates[] = date("m/d/y", strtotime($row["weight_log_date"]));
      }
      }
      else {
          echo "0 results";
      }
      $conn->close();
      return array(json_encode(array_reverse($weights)), json_encode(array_reverse($dates)));
    }

    function getCalorieLogData($user_id, $time){
      include('../getgains/utilities/connection.php');

      switch($time){
        case 0: $sql = "SELECT calorie, calorie_log_date FROM calorie_log WHERE user_id = " . $user_id . " ORDER BY calorie_log_date DESC LIMIT 7";
          break;
        case 1: $sql = "SELECT calorie, calorie_log_date FROM calorie_log WHERE user_id = " . $user_id . " ORDER BY calorie_log_date DESC LIMIT 30";
          break;
        case 2: $sql = "SELECT calorie, calorie_log_date FROM calorie_log WHERE user_id = " . $user_id . " ORDER BY calorie_log_date DESC LIMIT 183";
          break;
        case 3: $sql = "SELECT calorie, calorie_log_date FROM calorie_log WHERE user_id = " . $user_id . " ORDER BY calorie_log_date DESC LIMIT 365";
      }

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $calories[] = $row["calorie"];
            $dates[] = date("m/d/y", strtotime($row["calorie_log_date"]));
      }
      }
      else {
          echo "0 results";
      }
      $conn->close();
      return array(json_encode(array_reverse($calories)), json_encode(array_reverse($dates)));
    }

    function addUserCalories($user_id, $calories){
      require_once('../utilities/connection.php');

      $sql = "INSERT INTO calorie_log (user_id, calorie, calorie_log_date)
      VALUES
      ( " . $user_id . ", " . $calories . ", SYSDATE())
      ON DUPLICATE KEY UPDATE calorie = calorie + " . $calories;

      if ($conn->query($sql) === TRUE) {
        echo "calorie log created";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
                
      $conn->close();
    }

    function addUserWater($user_id, $water){
      require_once('../utilities/connection.php');

      $sql = "INSERT INTO water_log (user_id, water, water_log_date)
      VALUES
      (". $user_id . ", " . $water . ", SYSDATE())
      ON DUPLICATE KEY UPDATE water = water + " . $water;

      if ($conn->query($sql) === TRUE) {
        echo "water log created";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
                
      $conn->close();
    }

    function getWaterLogData($user_id, $time){
      include('../getgains/utilities/connection.php');

      switch($time){
        case 0: $sql = "SELECT water, water_log_date FROM water_log WHERE user_id = " . $user_id . " ORDER BY water_log_date DESC LIMIT 7";
          break;
        case 1: $sql = "SELECT water, water_log_date FROM water_log WHERE user_id = " . $user_id . " ORDER BY water_log_date DESC LIMIT 30";
          break;
        case 2: $sql = "SELECT water, water_log_date FROM water_log WHERE user_id = " . $user_id . " ORDER BY water_log_date DESC LIMIT 183";
          break;
        case 3: $sql = "SELECT water, water_log_date FROM water_log WHERE user_id = " . $user_id . " ORDER BY water_log_date DESC LIMIT 365";
      }

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $water[] = $row["water"];
            $dates[] = date("m/d/y", strtotime($row["water_log_date"]));
      }
      }
      else {
          echo "0 results";
      }
      $conn->close();
      return array(json_encode(array_reverse($water)), json_encode(array_reverse($dates)));
    }
}
?>