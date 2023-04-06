<?php
include('Admin/includes/database.php');
include('Admin/includes/config.php');
include('Admin/includes/functions.php');
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" type="text/css" rel="stylesheet">
    <title>Azmat Pathan</title>
    <script src="https://kit.fontawesome.com/7ddfde177a.js" crossorigin="anonymous"></script>

</head>

<body>

    <div id="hero-content">
        <p id="my_intro__name">Azmat Pathan here.</p>

        <p id="my_intro__description">Dedicated and effective full-stack developer with 3+ years’ experience in application layers, presentation
            layers, and databases. Passionate to explore and learn new technologies. Seeking a challenging position that
            will enable me to create, implement and innovate new dimensions. Longing to expand my knowledge and
            contribute to the short and long-term goals of the organization by utilizing my technical and managerial
            capabilities</p>
    </div>


    <?php
    $query = 'SELECT *
            FROM contact_links
            ORDER BY name';
    $result2 = mysqli_query($connect, $query);
    ?>

    <?php
    $query = 'SELECT *
            FROM projects
            ORDER BY date DESC';
    $result = mysqli_query($connect, $query);
    ?>

    <?php
    $query = 'SELECT *
            FROM skills
            ORDER BY name';
    $result3 = mysqli_query($connect, $query);
    ?>


    <?php
    $query = 'SELECT *
            FROM education 
            ORDER BY institution';
    $result4 = mysqli_query($connect, $query);
    ?>

    <div id="projects_title">
        <h1>Projects</h1>
    </div>

    <div id="projects_container">
        <?php while ($record = mysqli_fetch_assoc($result)) : ?>
            <div class="a_project">

                <h2><?php echo $record['title']; ?></h2>

                <?php if ($record['photo']) : ?>
                    <img src="<?php echo $record['photo']; ?>" class="project_image">
                <?php else : ?>
                    <p>No images for this record</p>
                <?php endif; ?>

                <?php $projectDesc = $record['content']; ?>
                <?php echo '<p class="project_description">' . $projectDesc . '</p>' ?>

            </div>

        <?php endwhile; ?>
    </div>


    <div id="education_title">
        <h1>Education</h1>
    </div>
    <div id="education_container">
        <?php while ($record = mysqli_fetch_assoc($result4)) : ?>
            <div class="an_education">
                <div class="an_education__information">
                    <h2><?php echo $record['degree']; ?></h2>
                    <p class="an_education__information__institution"><?php echo $record['institution']; ?></p>
                    <p class="an_education__information__year"><?php echo $record['year']; ?></p>
                </div>
                <?php if ($record['photo']) : ?>
                    <img src="<?php echo $record['photo']; ?>" width="50" height="50">
                <?php else : ?>
                    <p>No images for this record</p>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>



    <div id="skills_title">
        <h1>Skills</h1>
    </div>
    <div id="skills_container">
        <?php while ($record = mysqli_fetch_assoc($result3)) : ?>
            <div class="a_skill">
                <?php if ($record['photo']) : ?>
                    <img src="<?php echo $record['photo']; ?>" class="skill_image" width="80">
                <?php else : ?>
                    <p>This record does not have an image!</p>
                <?php endif; ?>
                <h2><?php echo $record['name']; ?></h2>
            </div>

        <?php endwhile; ?>
    </div>



    <div id="contact_title">
        <h1>Contact Me!</h1>
    </div>
    <div id="contact_container">
        <?php while ($record = mysqli_fetch_assoc($result2)) : ?>
            <h2><?php echo $record['name']; ?></h2>
            <p><?php echo $record['url']; ?></p>
            <?php if ($record['photo']) : ?>
                <img src="<?php echo $record['photo']; ?>" class="link_image" width="50">
            <?php else : ?>
                <p>No images for this record</p>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>



</body>

</html>