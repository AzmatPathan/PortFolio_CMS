<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_POST['title']))
{

    $query = 'INSERT INTO projects (
            title,
            content,
            type,
            date,
            url
            ) VALUES (
                "'.$_POST['title'].'",
                "'.$_POST['content'].'",
                "'.$_POST['type'].'",
                "'.$_POST['date'].'",
                "'.$_POST['url'].'"
            )';

    mysqli_query($connect, $query);

    // set_message('A new user has been added');

    header('Location: projects.php');
    die();
}

include('includes/header.php');

?>

<h2>Add Project</h2>

<form method="post">

    Title:
    <input type="text" name="title">

    <br>

    Content:
    <textarea  name="content"></textarea>

    <br>

    Date:
    <input type="date" name="date">

    <br>

    URL:
    <input type="text" name="url">

    <br>

    <select name="type">
    <?php 

    $values = array('Website', 'Graphic Design');

    foreach($values as $key => $value)
    {
        echo '<option value="'.$value.'">'.$value.'</option>';
    }

    ?>
    </select>

    <br>

    <input type="submit" value="Submit">
</form>

<?php

include('includes/footer.php');

?>