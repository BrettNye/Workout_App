<?php
    require_once('./header.php');
?>  


<form method="POST" action="../getgains/functional_pages/insert_user.php" >
    Username:<input type="text" name="username" /><br />
    First Name:<input type="text" name="firstName" /><br />
    Last Name:<input type="text" name="lastName" /><br />
    Email: <input type="email" name="email"/><br/>
    Date of Birth: <input type="date" name="DOB"/><br/>
    Password:<input type="password" name="password" /><br />
    <input type="submit" value="Create User" />
</form>


<?php
    require_once('./footer.php');
?>  