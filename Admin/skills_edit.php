<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_POST['name']))
{

    $query = 'UPDATE skills SET
        name = "'.$_POST['name'].'"
        WHERE id = '.$_GET['id'];
    
    mysqli_query($connect, $query);

    set_message('Skill has been updated');

    header('Location: skills.php');
    die();
}

include('includes/header.php');

?>

<h2>Edit Skills List</h2>

<?php

    $query = 'SELECT *
        FROM skills
        WHERE id = '.$_GET['id'].'
        LIMIT 1';

    $result = mysqli_query($connect, $query);
    $record = mysqli_fetch_assoc($result);



?>


<form method="post">

    Name:
    <input type="text" name="name" value="<?php echo $record['name']; ?>">

    <br>

    <input type="submit" value="Edit Skill">
</form>