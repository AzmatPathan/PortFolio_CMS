<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_POST['first']))
{

    $query = 'INSERT INTO users (
            first,
            last,
            email,
            password,
            active
            ) VALUES (
                "'.$_POST['first'].'",
                "'.$_POST['last'].'",
                "'.$_POST['email'].'",
                "'.md5($_POST['password']).'",
                "'.$_POST['active'].'"
            )';

    mysqli_query($connect, $query);

    set_message('A new user has been added');

    header('Location: users.php');
    die();
}

include('includes/header.php');

?>

<h2>Add User</h2>

<form method="post">

    First:
    <input type="text" name="first">

    <br>

    Last:
    <input type="text" name="last">

    <br>

    Email Address:
    <input type="text" name="email">

    <br>

    Password:
    <input type="password" name="password">

    <br>

    Active:
    <select name="active">
    <?php

    $values = array('Yes', 'No');

    foreach($values as $key => $value)
    {
        echo '<option value="'.$value.'">'.$value.'</option>';
    }

    ?>
    </select>

    <br>

    <input type="submit" value="Add User">
</form>