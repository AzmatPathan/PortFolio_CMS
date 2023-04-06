<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_POST['title']))
{

    $query = 'UPDATE projects SET
        title = "'.$_POST['title'].'",
        content = "'.$_POST['content'].'",
        url = "'.$_POST['url'].'",
        type = "'.$_POST['type'].'",
        date = "'.$_POST['date'].'"
        WHERE id = '.$_GET['id'];
    
    mysqli_query($connect, $query);

    set_message('Project has been updated');

    header('Location: projects.php');
    die();
}

include('includes/header.php');

?>

<h2>Edit Project</h2>

<?php

    $query = 'SELECT *
        FROM projects
        WHERE id = '.$_GET['id'].'
        LIMIT 1';

    $result = mysqli_query($connect, $query);
    $record = mysqli_fetch_assoc($result);



?>


<form method="post">

    Title:
    <input type="text" name="title" value="<?php echo $record['title']; ?>">

    <br>

    Content:
    <textarea name="content"><?php echo $record['content']; ?></textarea>

    <br>

    Date:
    <input type="date" name="date" value="<?php echo $record['date']; ?>">

    <br>

    URL:
    <input type="text" name="url" value="<?php echo $record['url']; ?>">

    <br>

    Type:
    <select name="type">
    <?php

    $values = array('Website', 'Graphic Design');

    foreach($values as $key => $value)
    {
        echo '<option value="'.$value.'"';
        if($record['type'] == $value) echo ' selected';
        echo '>'.$value.'</option>';
    }

    ?>
    </select>

    <br>

    <input type="submit" value="Edit Project">
</form>