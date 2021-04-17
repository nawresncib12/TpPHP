<?php

session_start();
if ((isset($_SESSION['created']))) {
    header("Location:add.php");
}

include('head.php');
?>

<body>
    <div class="container">
        <form action="add.php" method="post">
            <label for="1">First person</label>
            <input type="text" name="first" class="form-control" id="1" placeholder="Name">

            <input type="text" name="firstName" class="form-control" placeholder="First Name">

            <label for="2">Second person</label>
            <input type="text" name="second" class="form-control" id="2" placeholder="Name">

            <input type="text" name="secondName" class="form-control" placeholder="First Name">
            <br>
            <input type="submit" class="btn btn-secondary" name="created" value="Create session" />
        </form>
    </div>

</body>

</html>