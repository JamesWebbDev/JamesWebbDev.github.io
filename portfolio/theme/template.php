<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | Online Portfolio</title>
    <link rel="stylesheet" type="text/css" href=<?php echo $themefolder . '/app.css' ?>>
    <?php echo $embedstyle ?>
    <?php echo $embedscript ?>
</head>
<body>
    <header>
        <div style="height: 20px"></div>
        <h1 class="header-title">JAMES WEBSTER</h1>
        <div style="height: 20px"></div>
        <nav>
            
            <div class ="ham-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
                
            <div class="off-screen-menu">
                <ul class="no-bullets">

                    <?php 

                        /* ECHOs a link for the heading bar */
                        $linkGenerator = function($dns, $page, $label, $colour, $bColour) {

                            $button = '<button style="border-color:'.$colour.
                                        '; background-color:'.$bColour.';">'.$label.'</button>';
                            $target = '"http://'.$dns.'/'.$page.'"';

                            echo '<li><a href='.$target.'>'.$button.'</a></li>';
                        };

                        $isProjectPage = isset($_GET['project']);
                        $homeLabel = $isProjectPage ? 'Home' : '<b><u>Home</u></b>';

                        $linkGenerator($dns, 'index.php', $homeLabel, 'rgb(150, 150, 200)', 'rgb(30, 30, 40)');

                        $directory = 'data/xml/*.xml'; // Get all .xml files

                        // Returns an array of file paths matching the pattern
                        $files = glob($directory);

                        if ($files == false) {
                            // No matching files found
                            echo 'No xml files found!';
                        } else {
                            foreach ($files as $file) {

                                $fileName = str_replace('.xml', "", basename($file));
                                $root = simplexml_load_file($file); 

                                // Returns a string of 'true' or 'false', or 'false'
                                $isEnabled = $root['enabled'];
                                if (empty($isEnabled)) {
                                    echo 'Found xml ' . $fileName . ' has no "enabled" attribute! ';
                                } elseif ($isEnabled == 'true') {
                                    // Create a link to this xml page
                                    
                                    $label = $root->xpath("shortname")[0];

                                    $primaryCol = $root->xpath("//primary")[0];
                                    $secondaryCol = $root->xpath("//secondary")[0];
                                    $tertiaryCol = $root->xpath("//tertiary")[0];
                                    $surfaceCol = $root->xpath("//surface")[0];
                                    $onSurfaceCol = $root->xpath("//onsurface")[0];
                                    
                                    if ($isProjectPage && $_GET["project"] == $fileName) {
                                        // Underline current page's link
                                        $label = '<b><u>' . $label . '</u></b>';
                                    }

                                    $projecturl = 'project.php?project='.$fileName;
                                    $linkGenerator($dns, $projecturl, $label, $primaryCol, $tertiaryCol);
                                }

                            }
                        }

                    ?>

                    
                </ul>
            </div>
            <div class="navbar-links hide-text">
                <a  href="https://www.linkedin.com/in/james-webster-390a9423a/"><button class="navbar-button-img">
                    <img 
                    src=<?php echo $datafolder . '/images/free/in.webp' ?>
                    alt="LinkedIn button"/>
                </button></a>
                <a href="https://github.com/JamesWebbDev"><button class="navbar-button-img">
                    <img 
                    src=<?php echo $datafolder . '/images/free/github.webp' ?>
                    alt="Github button"/>
                </button></a>
            </div>
        </nav>
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

        <?php echo $content; ?>

        <?php $customlogic(); ?>

        <?php echo $contentsecond; ?>


    </main>

    <footer>
        <p class="footer-block">&copy; 2026 James Webster. All Rights Reserved.</p>
    </footer>
</body>