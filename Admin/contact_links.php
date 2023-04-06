<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_GET['delete']))
{
    $query = 'DELETE FROM contact_links
        WHERE id = '.$_GET['delete'].' 
        LIMIT 1';
    mysqli_query($connect, $query); 

    set_message('Contact Link has been deleted');

    header('Location: contact_links.php');
    die();
}

include('includes/header.php');

?>

<h2>Manage Contact Links</h2>

<?php
$query = 'SELECT *
    FROM contact_links
    ORDER BY name';
$result = mysqli_query($connect, $query);

?>

<table border="1">
    <tr>
        
        <th>ID</th>
        <th>Name</th>
        <th>URL</th>
        <th>Photo</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>

    <?php while($record = mysqli_fetch_assoc($result)): ?>

    <tr>
        
        <td><?php echo $record['id'] ?></td>
        <td><?php echo $record['name'] ?></td>
        <td><?php echo $record['url'] ?></td>
        <td>

            <?php if($record['photo']): ?> <img src="<?php echo $record['photo']; ?>" width="200"><?php endif; ?>
        </td>
        <td><a href="contact_links_photo.php?id=<?php echo $record['id']; ?>">Change Photo</a></td>
        <td><a href="contact_links_edit.php?id=<?php echo $record['id']; ?>">Edit</a></td>
        <td><a href="contact_links.php?delete=<?php echo $record['id']; ?>">Delete</a></td>
    </tr>


    <?php endwhile; ?>

</table>

<a href="contact_links_add.php">Add Contact Link</a>

<?php

include('includes/footer.php');

?>