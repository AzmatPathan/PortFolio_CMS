
<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_FILES['photo']))
{

    switch($_FILES['photo']['type'])
    {
        case 'image/png': $type = 'png'; break;
        case 'image/svg': $type = 'svg'; break;
        case 'image/jpg':
        case 'image/jpeg': $type = 'jpg'; break;
        case 'image/gif': $type = 'gif'; break;
        default: header('Location: contact_links.php');
    }

    $photo = 'data:image/'.$type.';base64,'.base64_encode(file_get_contents($_FILES['photo']['tmp_name']));
       
    $query = 'UPDATE contact_links SET
            photo = "'.$photo.'"
            WHERE id = '.$_GET['id'];
    
        mysqli_query($connect, $query);

    
    
    set_message('Photo has been updated');

    header('Location: contact_links.php');
    die();


    // echo '<img src="'.$photo.'">';    
    // die();


    //   stuff goes here
}

include('includes/header.php');

?>

<h2>Edit Photo</h2>

<?php

    $query = 'SELECT *
        FROM contact_links
        WHERE id = '.$_GET['id'].'
        LIMIT 1';

    $result = mysqli_query($connect, $query);
    $record = mysqli_fetch_assoc($result);



?>


<form method="post" enctype="multipart/form-data">

    Photo:
    <input type="file" name="photo">

    <br>

    <input type="submit" value="Add Photo">
</form>