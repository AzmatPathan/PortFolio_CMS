<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_POST['name']))
{

    $query = 'INSERT INTO contact_links (
            name,
            url
            ) VALUES (
                "'.$_POST['name'].'",
                "'.$_POST['url'].'"
            )';

    mysqli_query($connect, $query);

    // set_message('A new user has been added');

    header('Location: contact_links.php');
    die();
}

include('includes/header.php');

?>

<h2>Add Contact Link</h2>

<form method="post">

    Name:
    <input type="text" name="name">

    <br>

    URL:
    <input type="text" name="url">

    <br>

       <input type="submit" value="Submit">
</form>

<?php

include('includes/footer.php');

?>