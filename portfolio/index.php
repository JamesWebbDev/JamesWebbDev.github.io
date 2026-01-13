<?php
	$title = 'Home';
	$datafolder = 'data'; // Data folder, pointed to from root
	$themefolder = 'theme'; // Theme folder, pointed to from root
    $embedstyle = '';
    $embedscript = '  ';
    $content = '<div class="container-main">
            <div class="container" style="background-color: rgb(20, 20, 20);">
                <h1 class="container-title">My Portfolio</h1>
            </div>
            <div class="container" style="background-color: rgb(5, 5, 5);">
                <div class="vid-wrapper">
                    <iframe 
                    width="100%" 
                    height="100%" 
                    src="https://www.youtube.com/embed/Tie5Ku4J51Y?si=Twrxbxo7eGwjSE7B" 
                    title="Portfolio Show Reel" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="container" style="background-color: rgb(20, 20, 20);">
                <h2 class="container-title">Projects</h2>
                <div class="grid">';
    $customlogic = function() {

        $directory = 'data/xml/*.xml'; // Get all .xml files

        // Returns an array of file paths matching the pattern
        $files = glob($directory);

        if ($files == false) {
            // No matching files found
            echo 'No xml files found!';
        } else {
            foreach ($files as $file) {

                $fileName = trim(basename($file), '.xml');
                $root = simplexml_load_file($file); 

                // Returns a string of 'true' or 'false', or 'false'
                $isEnabled = $root['enabled'];
                if (empty($isEnabled)) {
                    echo 'Found xml ' . $fileName . ' has no "enabled" attribute! ';
                } elseif ($isEnabled == 'true') {
                    // Generate a summary and linked block
                    $projectName = $root->xpath("name")[0];
                    $projectIntro = $root->xpath("introduction")[0];
                    $projectBanner = $root->xpath("banner")[0];

                    $primaryCol = $root->xpath("//primary")[0];
                    $secondaryCol = $root->xpath("//secondary")[0];

                    echo '<div class="grid-element ele-right" style="background-color:' . 
                        $secondaryCol . '; border-color:' . $primaryCol . ';">';
                    echo '<img src=data/' . $projectBanner . ' class="ele-image" alt="' . $projectBanner["alt"] . '">';
                    echo '<button id=' . $fileName . ' class="ele-button">Read More</button>';
                    echo '<div class="ele-desc">';
                        echo '<div class="ele-para">' . $projectIntro . '</div>';
                        echo '<div class="ele-header">' . $projectName . '</div>';
                    echo '</div></div>';
                }

            }
        }
    };
    $contentsecond = '
                    </div>
                </div>
                <script>
                    function createLinkButtonListener(pageButton, htmlString) {
                        pageButton.addEventListener("mouseup", function (event) {

                            if (event.button === 2)
                            {
                                return;
                            }

                            if (event.button === 1 || event.ctrlKey || event.shiftKey) {
                                window.open(htmlString, "_blank");
                            } else {
                                window.location.href = htmlString;
                            }
                    });
        }
                    // Get a reference to the button element for Read More buttons
                    const btnRD = document.getElementById("riad");
                    const btnAV = document.getElementById("avs");
                    const btnMK = document.getElementById("murky");
                    const btnDD = document.getElementById("diner");
                    const btnGD = document.getElementById("down");
                    const btnMS = document.getElementById("sheep");
                    const btnPP = document.getElementById("pong");

                    createLinkButtonListener(btnRD, "http://jameswebbdev.io/project.php?project=riad")
                    createLinkButtonListener(btnAV, "http://jameswebbdev.io/project.php?project=avs");
                    createLinkButtonListener(btnMK, "http://jameswebbdev.io/project.php?project=murky");
                    createLinkButtonListener(btnDD, "http://jameswebbdev.io/project.php?project=diner");
                    createLinkButtonListener(btnGD, "http://jameswebbdev.io/project.php?project=down");
                    createLinkButtonListener(btnMS, "http://jameswebbdev.io/project.php?project=sheep");
                    createLinkButtonListener(btnPP, "http://jameswebbdev.io/project.php?project=pong");
                        
                </script>
            </div>
            <div class="container" style="background-color: rgb(20, 30, 30);">
                <h2 class="container-title" style="font-size: min(10vw, 50px);">GET IN TOUCH</h2>
                <p class="container-title-sub">I\'d love to hear from you</p>
                <div class="container-blocks">
                    <div class="block" style="background-color: whitesmoke">
                        <div class="block-container">
                            <img src="pngs/free/mail.png"
                            class="block-img"

                            alt="Mail image"> 
                        </div>
                        <div class="block-container block-txt" 
                            style="color:rgb(70, 70, 70);
                            font-size: 19px;">
                            jameswebsterdevportfolio@gmail.com
                        </div>
                    </div>
                    <div 
                    class="block" 
                    style="background-color: rgb(233, 47, 47);">
                        <div class="block-container">
                            <img src="pngs/free/phone.png"
                            class="block-img"

                            alt="Phone image"> 
                        </div>
                        <div class="block-container block-txt">
                            61+ 490 845 381
                        </div>
                    </div>
                    <div class="block" style="background-color: rgb(54, 131, 179)">
                        <div class="block-container">
                            <img src="pngs/free/in.png"
                            class="block-img"
                            
                            alt="LinkedIn logo "> 
                        </div>
                        <div class="block-container block-txt" 
                            style="font-size: 22px;">
                            Find me on LinkedIn
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    ';
?>


<?php include($themefolder . '/template.php'); ?>