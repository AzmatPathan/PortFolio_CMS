<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_GET['delete']))
{
    $query = 'DELETE FROM projects
        WHERE id = '.$_GET['delete'].' ßs
        LIMIT 1';
    mysqli_query($connect, $query); 

    set_message('Project has been deleted');

    header('Location: projects.php');
    die();
}

include('includes/header.php');

?>

<h2>Manage Projects</h2>

<?php
$query = 'SELECT *
    FROM projects
    ORDER BY date';
$result = mysqli_query($connect, $query);

?>

<table border="1">
    <tr>
        
        <th>ID</th>
        <th>Title</th>
        <th>Type</th>
        <th>Date</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>

    <?php while($record = mysqli_fetch_assoc($result)): ?>

    <tr>
        
        <td><?php echo $record['id'] ?></td>
        <td><?php echo $record['title'] ?></td>
        <td><?php echo $record['type'] ?></td>
        <td><?php echo $record['date'] ?></td>
        <td>

            <?php if($record['photo']): ?> <img src="<?php echo $record['photo']; ?>" width="200"><?php endif; ?>
        </td>
        <td><a href="projects_photo.php?id=<?php echo $record['id']; ?>">Change Photo</a></td>
        <td><a href="projects_edit.php?id=<?php echo $record['id']; ?>">Edit</a></td>
        <td><a href="projects.php?delete=<?php echo $record['id']; ?>">Delete</a></td>
    </tr>


    <?php endwhile; ?>

</table>

<a href="projects_add.php">Add Project</a>

<?php

include('includes/footer.php');

?>