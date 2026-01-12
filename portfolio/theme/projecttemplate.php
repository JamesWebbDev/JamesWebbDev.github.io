<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | Online Portfolio</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $themefolder ?>/app.css">
    <?php echo $embedstyle ?>
    <?php echo $embedscript ?>
</head>
<body>
    <header>
        <div style="height: 20px"></div>
        <h1 class="header-title">JAMES WEBSTER</h1>
        <div style="height: 20px"></div>
        <div style="display: flex; flex-direction: row; background-color: rgb(30, 30, 30);">
            <nav>
                <div class ="ham-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                
            </nav>
            <div class="off-screen-menu">
                <ul class="no-bullets">
                    <li><a href="http://jameswebbdev.io/index.php">Home</a></li>
                    <li><a href="http://jameswebbdev.io/project.php?project=riad">Rome In A Day</a></li>
                    <li><a href="http://jameswebbdev.io/project.php?project=avs"><u>AVS</u></a></li>
                    <li><a href="http://jameswebbdev.io/project.php?project=murky">Murky</a></li>
                    <li><a href="http://jameswebbdev.io/project.php?project=diner">Dungeon Diner</a></li>
                    <li><a href="http://jameswebbdev.io/project.php?project=down">GET DOWN</a></li>
                    <li><a href="http://jameswebbdev.io/project.php?project=sheep">Move Sheep</a></li>
                    <li><a href="http://jameswebbdev.io/project.php?project=pong">Pirate Pong</a></li>
                </ul>
            </div>
            <div class="navbar-links hide-text">
                <a  href="https://www.linkedin.com/in/james-webster-390a9423a/"><button class="navbar-button-img">
                    <img 
                    src="pngs/free/linked.png" 
                    alt="LinkedIn button"/>
                </button></a>
                <a href="https://github.com/JamesWebbDev"><button class="navbar-button-img">
                    <img 
                    src="pngs/free/github.png" 
                    alt="Github button"/>
                </button></a>
            </div>
        </div>
        <script>
            const hamMenu = document.querySelector('.ham-menu');

            const offScreenMenu = document.querySelector('.off-screen-menu');

            hamMenu.addEventListener('click', () => {
                hamMenu.classList.toggle('active')
                offScreenMenu.classList.toggle('active')
            })

        </script>
        <hr>
    </header>

    <main>

        <?php 
            // Include php code and echoes to build our project page

            $project = $_GET["project"];
            $xmlpath = $datafolder . "/xml/" . $project . ".xml";
            $root = simplexml_load_file($xmlpath); 

            // Gather variables from XML file
            $name = $root->xpath("name")[0];
            $desc = $root->xpath("description")[0];
            $start = $root->xpath("start")[0];
            $end = $root->xpath("end")[0];
            $role = $root->xpath("role")[0];
            $skillsList = $root->xpath("skill");
            $technologiesList = $root->xpath("technology");

            $banner = $root->xpath("banner")[0];
            $backgroundImage = $root->xpath("backimage")[0];
            $slidesList = $root->xpath("ssimage");
            $youtubeLink = $root->xpath("youtubeurl")[0];
            $externalLinksList = $root->xpath("externallink");

            $primaryCol = $root->xpath("//primary")[0];
            $secondaryCol = $root->xpath("//secondary")[0];
            $tertiaryCol = $root->xpath("//tertiary")[0];
            $surfaceCol = $root->xpath("//surface")[0];
            $onSurfaceCol = $root->xpath("//onsurface")[0];

            /* Replace '##' in strings with html tags! */
            $counter = 0;
            $newSkillsList = [];
            foreach($skillsList as $skill) {
                $newSkill = str_replace("##", "<strong>", $skill);
                $newSkill = str_replace("#/#", "</strong>", $newSkill);
                $newSkillsList[$counter] = $newSkill;
                $counter++;
            }

            $counter = 0;
            $newTechList = [];
            foreach($technologiesList as $tech) {
                $newTech = str_replace("##", "<strong>", $tech);
                $newTech = str_replace("#/#", "</strong>", $newTech);
                $newTechList[$counter] = $newTech;
                $counter++;
            }

            /* First container, with the title and banner */

            echo '<div class="container banner-height" style="background-color:' . $secondaryCol . '">' . 
                 '    <section class="flex-row template-header-box hide-banner">' . 
                 '        <div class="dim-max" style="display: flex;">' . 
                 '            <img class="border-basic"' . 
                 '                style="flex: 1 0 100%; object-fit:cover; border-color:' . $primaryCol . '"' .
                 '                src="data/' . $banner . '" ' . 
                 '                alt="' . $banner["alt"] . '" ' . 
                 '        </div>' . 
                 '    </section>' . 
                 '    <section class="flex-row template-header-box replace-banner">' . 
                 '        <div class="dim-half-x hide-banner"></div>' . 
                 '        <div class="width-max border-basic"' . 
                 '            style="padding-bottom: 20px;  background-color:' . $surfaceCol . '; border-color:' . $primaryCol . '">' .
                 '            <h1>' . $name . '</h1>' . 
                 '            <p>' . $desc . '</p></div></section>' . 
                 '</div>
            ';

            /* Second container, with embedded YouTube video */

            echo '<div class="container"><div class="vid-wrapper">
                    <iframe width="100%" height="100%"' . 
                 '  src="' . $youtubeLink . '"  
                    title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                    </iframe>
                </div>
            </div>
            ';

            /* Third container, with information on project */

            echo '<div class="container" style="position: relative; padding-top: 20px; padding-bottom: 20px;">';
            echo '<img class="template-back-image dim-max"src="data/' . $backgroundImage . '" alt="' . $backgroundImage["alt"] . '">';
            
            echo '<div class="grid container-info-box">';

                /* Information A, High level stuff on project */
                echo '<div class="container-info" style="grid-area: a; border-color:' . $primaryCol . ';">
                        Start Date: <strong>' . $start . '</strong><br>
                        End Date: <strong>' . $end . '</strong><br>
                        Role: <strong>' . $role . '</strong><br>
                        <br>
                        <big>Learnt skills:</big> 
                        <ul>';
                    foreach($newSkillsList as $skill) {
                        echo '<li>' . $skill . '</li>';
                    }
                echo '</ul></div>';

                /* Information B, Technologies used and Button Links */
                echo '<div class="container-info" style="grid-area: b; border-color:' . $primaryCol . ';">
                        <big>Learnt Technologies:</big> 
                        <ul>';
                    foreach($newTechList as $tech) {
                        echo '<li>' . $tech . '</li>';
                    }
                echo '</ul>';
                foreach($externalLinksList as $link) {
                    echo '<button class="btn-info" style="border-color:' . $primaryCol . ';">
                            <a class="link-gameplay" href=' . $link . '>' . $link["label"] . '
                            </a></button>';
                }
                echo '</div>';

                /* Information C, Slideshow of project images */
                echo '<section class="container-info slideshow" style="grid-area: c; border-color:' . $primaryCol . ';">';
                    echo '<div class="slider-wrapper"><div class="slider">';
                    $imageId = 1;
                    foreach($slidesList as $slide) {
                        echo '<img id="slide-' . $imageId . '" src=data/' . $slide . ' alt="' . $slide["alt"] . '"/>';
                        $imageId++;
                    }
                echo '</div><div class="slider-nav">';
                    for ($index = 1; $index <= $imageId - 1; $index++) {
                        echo '<a href="#slide-' . $index . '"></a>';
                    }
                echo '</div></div></section>';

            echo '</div></div>';
        ?>

    </main>

    <footer>
        <p class="footer-block">&copy; 2026 by James Webster.</p>
    </footer>
</body>