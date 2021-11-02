<?php
    require_once ('header.php');
    if(isset($_GET['error'])){
        echo "<p id='error'>Login Failed<br>Username or Password was Incorrect</p>";
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/site.css">
    <title>Login</title>
  </head>
  <body>
    <div class="form-container mt-5 d-flex justify-content-center align-items-center flex-column">
    <form id="login" action="./functional_pages/login_function.php" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Username</label>
          <input id="username" type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input id="password" type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <p id="failed"></p>
      </form>
      <a href="./register.php"><p>Don't have an account? Sign Up</p></a>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>

<?php
    require_once ('footer.php');
?>