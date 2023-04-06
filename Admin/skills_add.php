<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_POST['name']))
{

    $query = 'INSERT INTO skills (
            name
            ) VALUES (
                "'.$_POST['name'].'"
            )';

    mysqli_query($connect, $query);

    // set_message('A new user has been added');

    header('Location: skills.php');
    die();
}

include('includes/header.php');

?>

<h2>Add Skill</h2>

<form method="post">

    Name:
    <input type="text" name="name">

    <br>

       <input type="submit" value="Submit">
</form>

<?php

include('includes/footer.php');

?>