<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_POST['name']))
{

    $query = 'UPDATE contact_links SET
        name = "'.$_POST['name'].'",
        url = "'.$_POST['url'].'"
        WHERE id = '.$_GET['id'];
    
    mysqli_query($connect, $query);

    set_message('Contact Link has been updated');

    header('Location: contact_links.php');
    die();
}

include('includes/header.php');

?>

<h2>Edit Contact List</h2>

<?php

    $query = 'SELECT *
        FROM contact_links
        WHERE id = '.$_GET['id'].'
        LIMIT 1';

    $result = mysqli_query($connect, $query);
    $record = mysqli_fetch_assoc($result);



?>


<form method="post">

    Name:
    <input type="text" name="name" value="<?php echo $record['name']; ?>">

    <br>

    URL:
    <input type="text" name="url" value="<?php echo $record['url']; ?>">

    <br>

    <input type="submit" value="Edit Project">
</form>