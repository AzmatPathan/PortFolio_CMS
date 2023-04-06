<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_GET['delete']))
{
    $query = 'DELETE FROM skills
        WHERE id = '.$_GET['delete'].' 
        LIMIT 1';
    mysqli_query($connect, $query); 

    set_message('Skill has been deleted');

    header('Location: skills.php');
    die();
}

include('includes/header.php');

?>

<h2>Manage Skills</h2>

<?php
$query = 'SELECT *
    FROM skills
    ORDER BY name';
$result = mysqli_query($connect, $query);

?>

<table border="1">
    <tr>
        
        <th>ID</th>
        <th>Name</th>
        <th>Photo</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>

    <?php while($record = mysqli_fetch_assoc($result)): ?>

    <tr>
        
        <td><?php echo $record['id'] ?></td>
        <td><?php echo $record['name'] ?></td>
        <td>

            <?php if($record['photo']): ?> <img src="<?php echo $record['photo']; ?>" width="200"><?php endif; ?>
        </td>
        <td><a href="skills_photo.php?id=<?php echo $record['id']; ?>">Change Photo</a></td>
        <td><a href="skills_edit.php?id=<?php echo $record['id']; ?>">Edit</a></td>
        <td><a href="skills.php?delete=<?php echo $record['id']; ?>">Delete</a></td>
    </tr>


    <?php endwhile; ?>

</table>

<a href="skills_add.php">Add Skill</a>

<?php

include('includes/footer.php');

?>