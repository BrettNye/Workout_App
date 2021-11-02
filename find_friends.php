<?php
    require_once('./session/sessioncheck.php');
    require_once('header.php');
    require_once('./user/user.php');

    $user = new user;

    echo "
        <div>
            <form method=GET>
                <input type='text' name='search'/>
                <button type=submit></button>
            </form>
        </div>
    ";

    if(isset($_GET['search'])){

        $usersArr = $user->getUsersByUsername($_GET['search']);

    foreach($userArr as $username){
        echo $username;
    }
}

    require_once('./footer.php');
?>