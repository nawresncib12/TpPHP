<?php
session_start();

if (isset($_POST['created'])) {

    $_SESSION['created'] = $_POST['created'];
}
include("notcreated.php");

if (isset($_POST['created'])) {
    switch ($_POST['created']) {
        case 'Create session':

            $first = $_POST['first'];
            $firstName = $_POST['firstName'];
            $second = $_POST['second'];
            $secondName = $_POST['secondName'];
            $_SESSION[$first] = $firstName;
            $_SESSION[$second] = $secondName;
            break;

        case 'Add person':
            if (isset($_POST['new'])) {
                $_SESSION[$_POST['new']] = $_POST["newName"];
            }
            break;
        case 'Delete':
            if (isset($_POST['delete'])) {
                unset($_SESSION[$_POST['delete']]);
            }
            break;
        case 'Edit':
            if ((isset($_POST['original'])) && (isset($_POST['name'])) && (isset($_POST['firstname']))) {

                unset($_SESSION[$_POST['original']]);
                $_SESSION[$_POST['name']] = $_POST["firstname"];
            }
            break;
           
    }
}

include('head.php');
?>

<body>
    <div class="container">
        <h1>Welcome to your list</h1>
        <h3>Here are the persons on your list :</h3>
        <ul>
            <?php
            foreach ($_SESSION as $nom => $prenom) {
                if (($nom != "created") && ($nom != "")) {
                    echo " <li> $nom  $prenom </li> ";
                   
                }
            }
            ?>
        </ul>
        <h2>Add more if you want!</h2>
        <form action="add.php" method="post">
            <label for="new">New person</label>
            <input type="text" name="new" class="form-control" id="1" placeholder="Name">

            <input type="text" name="newName" class="form-control" placeholder="First Name">
            <br>
            <input type="submit" class="btn btn-secondary" name="created" value="Add person" />

        </form>
        <br>
        <h2>Do you want to delete someone ? Just give us their name!</h2>
        <form action="add.php" method="post">
            <label for="delete">Unwanted person</label>
            <input type="text" name="delete" class="form-control" id="1" placeholder="Name">
            <br>
            <input type="submit" class="btn btn-secondary" name="created" value="Delete" />

        </form>
        <br>
        <h2>Do you want to edit someone's name ? Just give us their original name and the new info!</h2>
        <form action="add.php" method="post">
            <label for="edit">Edit this person</label>
            <input type="text" name="original" class="form-control" id="1" placeholder="Old Name">
            <input type="text" name="name" class="form-control" id="1" placeholder="New Name">
            <input type="text" name="firstname" class="form-control" id="1" placeholder="New First Name">
            <br>
            <input type="submit" class="btn btn-secondary" name="created" value="Edit" />

        </form>
        <br>
        <a href="Quit.php " class="btn btn-primary"> Quitter la liste </a>
    </div>

</body>

</html>