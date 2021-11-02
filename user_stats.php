<?php
    require_once('./session/sessioncheck.php');
    require_once('header.php');
    require_once('./user/user.php');

    $user = new User;

    date_default_timezone_set('America/Denver');

    if(isset($_GET['weight'])){
    switch($_GET['weight']){
      case 0: $weight_data = $user->getWeightLog($_SESSION['user_id'], 0);
      break;
      case 1: $weight_data = $user->getWeightLog($_SESSION['user_id'], 1);
      break;
      case 2: $weight_data = $user->getWeightLog($_SESSION['user_id'], 2);
      break;
      case 3: $weight_data = $user->getWeightLog($_SESSION['user_id'], 3);
      break;
    }
    $weight = $weight_data[0];
    $weight_dates = $weight_data[1];
  }

  if(isset($_GET['calorie'])){
    switch($_GET['calorie']){
      case 0: $calorie_data = $user->getCalorieLog($_SESSION['user_id'], 0);
      break;
      case 1: $calorie_data = $user->getCalorieLog($_SESSION['user_id'], 1);
      break;
      case 2: $calorie_data = $user->getCalorieLog($_SESSION['user_id'], 2);
      break;
      case 3: $calorie_data = $user->getCalorieLog($_SESSION['user_id'], 3);
      break;
    }
    $calories = $calorie_data[0];
    $calorie_dates = $calorie_data[1];
  }

  if(isset($_GET['water'])){
    switch($_GET['water']){
      case 0: $water_data = $user->getWaterLog($_SESSION['user_id'], 0);
      break;
      case 1: $water_data = $user->getWaterLog($_SESSION['user_id'], 1);
      break;
      case 2: $water_data = $user->getWaterLog($_SESSION['user_id'], 2);
      break;
      case 3: $water_data = $user->getWaterLog($_SESSION['user_id'], 3);
      break;
    }
    $water = $water_data[0];
    $water_dates = $water_data[1];
  }

?>
<link type="text/css" rel="stylesheet" href="../getgains/CSS/site.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<div>
    <div id="chart-container" class="d-flex justify-content-between mt-5">
      <div class="weight d-flex flex-column ">
          <div class="header-container d-flex justify-content-between align-items-center bg-dark p-0">
            <p class="header m-0 p-0 ml-2 text-light">Water</p>
            <a id="water-modal" class="text-light mr-2 modal-add">+</a>
          </div>
          <p class="ml-2">
        <?php
          $OZ = number_format($user->getCurrentWater($_SESSION['user_id']), 1, '.', '');
          
          echo "Daily Log: " . $OZ . " Ounces"
        ?>
          </p>
          <canvas id="waterChart" class="mb-3" height="255"></canvas>
          <div id="graph-btn" class="d-flex justify-content-between align-items-center bg-dark pl-3 pr-3">
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo $_GET['weight'] . '&calorie=' . $_GET['calorie'] . '&water=0'?>">1W</a>
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo $_GET['weight'] . '&calorie=' . $_GET['calorie'] . '&water=1'?>">1M</a>
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo $_GET['weight']. '&calorie=' . $_GET['calorie'] . '&water=2'?>">6M</a>
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo $_GET['weight']. '&calorie=' . $_GET['calorie'] . '&water=3'?>">1Y</a>
          </div>
        </div>
        <div class="weight d-flex flex-column ">
          <div class="header-container d-flex justify-content-between align-items-center bg-dark p-0">
            <p class="header m-0 p-0 ml-2 text-light">Calories</p>
            <a id="calorie-modal" class="text-light mr-2 modal-add">+</a>
          </div>
          <p class="ml-2">
        <?php
          $cal = number_format($user->getCurrentCalories($_SESSION['user_id']), 1, '.', '');
          
          echo "Daily Log: " . $cal . " Calories"
        ?>
          </p>
          <canvas id="calorieChart" class="mb-3" height="255"></canvas>
          <div id="graph-btn" class="d-flex justify-content-between align-items-center bg-dark pl-3 pr-3">
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo $_GET['weight'] . '&calorie=0&water=' . $_GET['water']?>">1W</a>
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo $_GET['weight'] . '&calorie=1&water=' . $_GET['water']?>">1M</a>
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo $_GET['weight']. '&calorie=2&water=' . $_GET['water']?>">6M</a>
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo $_GET['weight'] . '&calorie=3&water=' . $_GET['water']?>">1Y</a>
          </div>
        </div>
        <div class="weight d-flex flex-column ">
          <div class="header-container d-flex justify-content-between align-items-center bg-dark p-0">
            <p class="header m-0 p-0 ml-2 text-light">Body Weight</p>
            <a id="weight-modal" class="text-light mr-2 modal-add">+</a>
          </div>
          <p class="ml-2">
        <?php
          $LBS = number_format($user->getCurrentWeight($_SESSION['user_id']), 1, '.', '');
          
          echo "Current: " . $LBS . " LBS"
        ?>
          </p>
          <canvas id="weightChart" class="mb-3" height="255"></canvas>
          <div id="graph-btn" class="d-flex justify-content-between align-items-center bg-dark pl-3 pr-3">
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo '?weight=0' . $_GET['calorie'] . $_GET['water']?>?>">1W</a>
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo '?weight=1' . $_GET['calorie'] . $_GET['water']?>?>">1M</a>
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo '?weight=2' . $_GET['calorie'] . $_GET['water']?>?>">6M</a>
            <a class="text-light graph-btn-item" href="user_stats.php?weight=<?php echo '?weight=3' . $_GET['calorie'] . $_GET['water']?>?>">1Y</a>
          </div>
        </div>
      </div>
  </div>

<!-- The Weight Modal -->
<div id="userWeightModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content d-flex flex-column justify-content-center align-items-center w-25">
    <div class="w-75 d-flex justify-content-center">
    <p class="modal-header m-0 p-0 ml-2">Log Body Weight</p>
    </div>
    <span class="close mr-2">&times;</span>
    <form id="weight-form" class="d-flex flex-column align-items-center mt-4" method="POST" action="../getgains/functional_pages/update_weight.php">
        <input class=" w-50" type="number" step=".1" name="weight" Placeholder="225.2 LBS"/>
        <button class="btn btn-dark w-75 mt-3" type="submit">Log</button>
    </form>
  </div>
</div>
<!-- The Calorie Modal -->
<div id="userCalorieModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content d-flex flex-column justify-content-center align-items-center w-25">
    <div class="w-75 d-flex justify-content-center">
    <p class="modal-header m-0 p-0 ml-2">Log Calories</p>
    </div>
    <span class="close mr-2">&times;</span>
    <form id="calorie-form" class="d-flex flex-column align-items-center mt-4" method="POST" action="../getgains/functional_pages/update_calories.php">
        <input class=" w-50" type="number" name="calories" Placeholder="212 Calories"/>
        <button class="btn btn-dark w-75 mt-3" type="submit">Log</button>
    </form>
  </div>
</div>
<!-- The Water Modal -->
<div id="userWaterModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content d-flex flex-column justify-content-center align-items-center w-25">
    <div class="w-75 d-flex justify-content-center">
    <p class="modal-header m-0 p-0 ml-2">Log Water</p>
    </div>
    <span class="close mr-2">&times;</span>
    <form id="water-form" class="d-flex flex-column align-items-center mt-4" method="POST" action="../getgains/functional_pages/update_water.php">
        <input class=" w-50" type="number" Step=".1" name="water" Placeholder="16 OZ"/>
        <button class="btn btn-dark w-75 mt-3" type="submit">Log</button>
    </form>
  </div>
</div>
<script>
    var ctx = document.getElementById('weightChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: <?php echo $weight_dates; ?>,
            datasets: [{
                label: 'Weight in LBS',
                data: <?php echo $weight; ?>,
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                fill: false
            }]
        }
    });
  </script>
  <script>
    var ctx1 = document.getElementById('calorieChart');
    var myChart1 = new Chart(ctx1, {
        type: 'line',
        data: {
          labels: <?php echo $calorie_dates; ?>,
            datasets: [{
                label: 'Calories',
                data: <?php echo $calories; ?>,
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                fill: false
            }]
        }
    });
  </script>
  <script>
    var ctx2 = document.getElementById('waterChart');
    var myChart2 = new Chart(ctx2, {
        type: 'line',
        data: {
          labels: <?php echo $water_dates; ?>,
            datasets: [{
                label: 'Water in OZ',
                data: <?php echo $water; ?>,
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1,
                fill: false
            }]
        }
    });
  </script>

<script>
// Get the modal
var modal = document.getElementById("userWeightModal");
var modal1 = document.getElementById("userCalorieModal");
var modal2 = document.getElementById("userWaterModal");

// Get the button that opens the modal
var btn = document.getElementById("weight-modal");
var btn1 = document.getElementById("calorie-modal");
var btn2 = document.getElementById("water-modal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];
var span2 = document.getElementsByClassName("close")[2];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}
btn1.onclick = function() {
  modal1.style.display = "block";
}
btn2.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

span1.onclick = function() {
  modal1.style.display = "none";
}

span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
  }
}

window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}

</script>
<?php
    require_once('footer.php');
?>