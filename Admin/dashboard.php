<?php

include('includes/config.php');
include('includes/functions.php');
include('includes/database.php');

secure();

include('includes/header.php');

?>

<h2>Dashboard</h2>

<a href="projects.php">Manage Projects</a>
<br>
<a href="users.php">Manage Users</a>
<br>
<a href="contact_links.php">Manage Contact Links</a>
<br>
<a href="skills.php">Manage Skills</a>
<br>
<a href="education.php">Manage Education</a>

<?php

include('includes/footer.php');

?>
