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

                    <?php 

                        $isProjectPage = isset($_GET['project']);

                        if (!$isProjectPage) {
                            echo '<li><a href="http://jameswebbdev.io/index.php"><u>Home</u></a></li>';
                        } else {
                            echo '<li><a href="http://jameswebbdev.io/index.php">Home</a></li>';
                        }

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
                                    
                                    if ($isProjectPage && $_GET["project"] == $fileName) {
                                        // Underline current page's link
                                        $label = '<u>' . $label . '</u>';
                                    }

                                    echo '<li><a href="http://jameswebbdev.io/project.php?project=' . 
                                            $fileName . '">' . $label . '</a></li>';
                                }

                            }
                        }

                    ?>

                    
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

        <?php echo $content; ?>

        <?php $customlogic(); ?>

        <?php echo $contentsecond; ?>


    </main>

    <footer>
        <p class="footer-block">&copy; 2026 by James Webster.</p>
    </footer>
</body>