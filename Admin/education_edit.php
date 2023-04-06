<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_POST['degree']))
{

    $query = 'UPDATE education SET
        degree = "'.$_POST['degree'].'",
        institution = "'.$_POST['institution'].'",
        year = "'.$_POST['year'].'"
        WHERE id = '.$_GET['id'];
    
    mysqli_query($connect, $query);

    set_message('Education has been updated');

    header('Location: education.php');
    die();
}

include('includes/header.php');

?>

<h2>Edit Education</h2>

<?php

    $query = 'SELECT *
        FROM education
        WHERE id = '.$_GET['id'].'
        LIMIT 1';

    $result = mysqli_query($connect, $query);
    $record = mysqli_fetch_assoc($result);



?>


<form method="post">

    Degree:
    <input type="text" name="degree" value="<?php echo $record['degree']; ?>">

    <br>

    Institution:
    <input type="text" name="institution" value="<?php echo $record['institution']; ?>">

    <br>
    Year:
    <input type="text" name="year" value="<?php echo $record['year']; ?>">

    <br>

    <input type="submit" value="Edit Education">
</form>