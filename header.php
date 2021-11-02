
    <head>
        
        <link type="text/css" rel="stylesheet" href="../getgains/CSS/site.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <?php
    if(isset($_SESSION['loggedIn'])){
    echo '<body>
        <nav id="main-nav" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Get Gains</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link text-light" href="#">Meal Planning</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#">Track Food</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#">Exercise</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="user_stats.php?weight=0&calorie=0&water=0">My Stats</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#">My Account</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="#">Timers</a></li>
            </ul>
            <div class="nav-item d-flex">
                <a class="nav-link text-light" href="./find_friends.php">Friends<a>    
                <a class="nav-link text-light" href="./functional_pages/logout_function.php">Logout</a>
            </div>
        </div>      
        </nav>
    </body>';
    }
    ?>
