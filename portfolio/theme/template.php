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

        <?php echo $content; ?>

        <?php $customlogic(); ?>

        <?php echo $contentsecond; ?>


    </main>

    <footer>
        <p class="footer-block">&copy; 2026 by James Webster.</p>
    </footer>
</body>