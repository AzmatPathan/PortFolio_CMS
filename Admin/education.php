<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_GET['delete']))
{
    $query = 'DELETE FROM education 
        WHERE id = '.$_GET['delete'].' 
        LIMIT 1';
    mysqli_query($connect, $query); 

    set_message('Education has been deleted');

    header('Location: education.php');
    die();
}

include('includes/header.php');

?>

<h2>Manage Education</h2>

<?php
$query = 'SELECT *
    FROM education
    ORDER BY id';
$result = mysqli_query($connect, $query);

?>

<table border="1">
    <tr>
        
        <th>ID</th>
        <th>Degree</th>
        <th>Institution</th>
        <th>Year</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>

    <?php while($record = mysqli_fetch_assoc($result)): ?>

    <tr>
        
        <td><?php echo $record['id'] ?></td>
        <td><?php echo $record['degree'] ?></td>
        <td><?php echo $record['institution'] ?></td>
        <td><?php echo $record['year'] ?></td>
        <td>

            <?php if($record['photo']): ?> <img src="<?php echo $record['photo']; ?>" width="200"><?php endif; ?>
        </td>
        <td><a href="education_photo.php?id=<?php echo $record['id']; ?>">Change Photo</a></td>
        <td><a href="education_edit.php?id=<?php echo $record['id']; ?>">Edit</a></td>
        <td><a href="education.php?delete=<?php echo $record['id']; ?>">Delete</a></td>
    </tr>


    <?php endwhile; ?>

</table>

<a href="education_add.php">Add Education</a>

<?php

include('includes/footer.php');

?>