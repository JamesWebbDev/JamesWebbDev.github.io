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
            <div class="container">
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
                <div class="grid">
                    <div class="grid-element ele-left" style="background-color: rgb(0, 51, 52); border-color: rgb(0, 215, 143);">
                        <img src="pngs/riad/riad_0.png"
                        class="ele-image"
                        alt="Feature Image of Rome In A Day"> 
                        <button id="riad" class="ele-button">
                            Read More
                        </button>
                        <div class="ele-desc">
                            
                            <div class="ele-para">
                                A Tycoon game with RTS controls, built for the browser.
                            </div>
                            <div class="ele-header">
                                Rome In A Day
                            </div>
                            
                        </div>
                    </div>
                    <div class="grid-element ele-right" style="background-color: rgb(34, 34, 34); border-color: rgb(97, 97, 97);">
                        <img src="pngs/avs/avs_logo_b.png" class="ele-image" alt="Feature Image of AVS"> 
                        
                        <div class="ele-desc">
                            <div class="ele-para">Some of the work I had done at AVS.</div>
                            <div class="ele-header">Applied Virtual Simulation (AVS)</div>
                        </div>
                    </div>';
    $customlogic = function() {

        $projectBlockerBuilder = function($project) {

            // e.g. $project = "avs";
            $xmlpath = "data/xml/" . $project . ".xml";
            $root = simplexml_load_file($xmlpath); 

            $projectName = $root->xpath("name")[0];
            $projectIntro = $root->xpath("introduction")[0];
            $projectBanner = $root->xpath("banner")[0];

            $primaryCol = $root->xpath("//primary")[0];
            $secondaryCol = $root->xpath("//secondary")[0];

            echo '<div class="grid-element ele-right" style="background-color:' . 
                $secondaryCol . '; border-color:' . $primaryCol . ';">';
            echo '<img src=data/' . $projectBanner . ' class="ele-image" alt="' . $projectBanner["alt"] . '">';
            echo '<button id=' . $project . ' class="ele-button">Read More</button>';
            echo '<div class="ele-desc">';
                echo '<div class="ele-para">' . $projectIntro . '</div>';
                echo '<div class="ele-header">' . $projectName . '</div>';
            echo '</div></div>';
        };
        
        $projectBlockerBuilder("avs");
    };
    $contentsecond = '
                    <div class="grid-element ele-left" style="background-color: rgb(80, 24, 29); border-color: rgb(192, 32, 32);">
                        <img src="pngs/murky/murky_3.png"
                        class="ele-image"
                        alt="Feature Image of my 3D Rendering Engine!"> 
                        <button id="murky" class="ele-button">
                            Read More
                        </button>
                        <div class="ele-desc">
                            
                            <div class="ele-para">
                                A Rendering Engine I made from scratch for applications that draw 3D models.
                            </div>
                            <div class="ele-header">
                                Murky Engine
                            </div>
                            
                        </div>
                    </div>
                    <div class="grid-element ele-right" style="background-color: rgb(55, 59, 77); border-color: rgb(139, 120, 224);">
                        <img src="pngs/d_diner/dd_0.png"
                        class="ele-image"
                        alt="Feature Image of Dungeon Diner"> 
                        <button id="diner" class="ele-button">
                            Read More
                        </button>
                        <div class="ele-desc">
                            
                            <div class="ele-para">
                                A top-down dungeon crawler where you slay monsters to serve them to your customers.
                            </div>
                            <div class="ele-header">
                                Dungeon Diner
                            </div>
                            
                        </div>
                    </div>
                    <div class="grid-element ele-left" style="background-color: rgb(141, 81, 0); border-color: rgb(209, 113, 50);">
                        <img src="pngs/get_down/gd_0.png"
                        class="ele-image"
                        alt="Feature Image of Get Down!"> 
                        <button id="down" class="ele-button">
                            Read More
                        </button>
                        <div class="ele-desc">
                            
                            <div class="ele-para">
                                A hyper-casual mobile game where you dig as far down as you can!
                            </div>
                            <div class="ele-header">
                                GET DOWN!!!
                            </div>
                            
                        </div>
                    </div>
                    <div class="grid-element ele-right" style="background-color: rgb(55, 63, 24); border-color: rgb(211, 255, 88);">
                        <img src="pngs/m_sheep/ms_2.jpg"
                        class="ele-image"
                        alt="Feature Image of Move Sheep"> 
                        <button id="sheep" class="ele-button">
                            Read More
                        </button>
                        <div class="ele-desc">
                            
                            <div class="ele-para">
                                An endless mobile game about herding lots of sheep using sheep dogs.
                            </div>
                            <div class="ele-header">
                                Move Sheep!!!
                            </div>
                            
                        </div>
                    </div>
                    <div class="grid-element ele-left" style="background-color: rgb(40, 75, 102); border-color: rgb(87, 183, 247);">
                        <img src="pngs/p_pong/pp_0.png"
                        class="ele-image"
                        alt="Feature Image of Pirate Pong"> 
                        <button id="pong" class="ele-button">
                            Read More
                        </button>
                        <div class="ele-desc">
                            <div class="ele-para">
                                A local multiplayer party game with two pirates and a cannon ball.
                            </div>
                            <div class="ele-header">
                                Pirate Pong
                            </div>
                        </div>
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