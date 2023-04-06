<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_POST['degree']))
{

    $query = 'INSERT INTO education (
            degree,
            institution,
            year
            ) VALUES (
                "'.$_POST['degree'].'",
                "'.$_POST['institution'].'",
                "'.$_POST['year'].'"
            )';

    mysqli_query($connect, $query);

    // set_message('A new user has been added');

    header('Location: education.php');
    die();
}

include('includes/header.php');

?>

<h2>Add Education</h2>

<form method="post">

    Degree:
    <input type="text" name="degree">

    <br>

    Institution:
    <input type="text" name="institution">

    <br>
    Year:
    <input type="text" name="year" placeholder="(YYYY-YYYY)">

    <br>

    <input type="submit" value="Submit">
</form>

<?php

include('includes/footer.php');

?>