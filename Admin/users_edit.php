<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

if (isset($_POST['first']))
{

    $query = 'UPDATE users SET
        first = "'.$_POST['first'].'",
        last = "'.$_POST['last'].'",
        email = "'.$_POST['email'].'",
        active = "'.$_POST['active'].'"
        WHERE id = '.$_GET['id'];
    
    mysqli_query($connect, $query);

if($_POST['password'])
{
    $query = 'UPDATE users SET
        password = "'.md5($_POST['password']).'"
        WHERE = id = '.$_GET['id'];
    mysqli_query($connect, $query);

}

    set_message('User has been updated');

    header('Location: users.php');
    die();
}

include('includes/header.php');

?>

<h2>Edit User</h2>

<?php

    $query = 'SELECT *
        FROM users
        WHERE id = '.$_GET['id'].'
        LIMIT 1';

    $result = mysqli_query($connect, $query);
    $record = mysqli_fetch_assoc($result);



?>


<form method="post">

    First:
    <input type="text" name="first" value="<?php echo $record['first']; ?>">

    <br>

    Last:
    <input type="text" name="last" value="<?php echo $record['last']; ?>">

    <br>

    Email Address:
    <input type="text" name="email" value="<?php echo $record['email']; ?>">

    <br>

    Password:
    <input type="password" name="password">

    <br>

    Active:
    <select name="active">
    <?php

    $values = array('Yes', 'No');

    foreach($values as $key => $value)
    {
        echo '<option value="'.$value.'"';
        if($record['active'] == $value) echo ' selected';
        echo '>'.$value.'</option>';
    }

    ?>
    </select>

    <br>

    <input type="submit" value="Edit User">
</form>