<?php
    /* $_GET fetches the name of the project sent by the <a> tags in 'template.php' e.g. 'avs' */
    {
        $project = $_GET["project"];
        $xmlpath = "data/xml/" . $project . ".xml";
        $root = simplexml_load_file($xmlpath); 
        $title = $root->xpath("shortname")[0];
    }
    
    $customlogic = function() {
        $project = $_GET["project"];
        $xmlpath = "data/xml/" . $project . ".xml";
        $root = simplexml_load_file($xmlpath); 

        // Gather variables from XML file
        $name = $root->xpath("name")[0];
        $desc = $root->xpath("description")[0];
        $start = $root->xpath("start")[0];
        $end = $root->xpath("end")[0];
        $role = $root->xpath("role")[0];
        $engine = $root->xpath("engine")[0];
        $skillsList = $root->xpath("skill");
        $technologiesList = $root->xpath("technology");

        $banner = $root->xpath("banner")[0];
        $backgroundImage = $root->xpath("backimage")[0];
        $slidesList = $root->xpath("ssimage");
        $youtubeLink = $root->xpath("youtubeurl");
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

        if (!empty($youtubeLink)) {
            echo '<div class="container" style="background-color:' . $tertiaryCol . '"><div class="vid-wrapper">
                    <iframe width="100%" height="100%"' . 
                '  src="' . $youtubeLink[0] . '"  
                    title="YouTube video player" frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
                    </iframe>
                </div>
            </div>
            ';
        }
        

        /* Third container, with information on project */

        echo '<div class="container" style="position: relative; padding-top: 20px; padding-bottom: 20px;">';
        echo '<img class="template-back-image dim-max"src="data/' . $backgroundImage . '" alt="' . $backgroundImage["alt"] . '">';
        
        echo '<div class="grid container-info-box">';

            /* Information A, High level stuff on project */
            echo '<div class="container-info" style="grid-area: a; border-color:' . $primaryCol . ';">
                    Start Date: <strong>' . $start . '</strong><br>
                    End Date: <strong>' . $end . '</strong><br>
                    Role: <strong>' . $role . '</strong><br>';

            if (!empty($engine)) { echo 'Engine: <strong>'. $engine .'</strong><br>'; }

            echo    '<br><big>Learnt skills:</big><ul>';
                foreach($newSkillsList as $skill) {
                    echo '<li>' . $skill . '</li>';
                }
            echo '</ul></div>';

            /* Information B, Technologies used and Button Links */
            echo '<div class="container-info" style="grid-area: b; border-color:' . $primaryCol . 
                    '; ">';

                if (!empty($technologiesList)) {
                    echo '<big>Learnt Technologies:</big><ul>';
                    foreach($newTechList as $tech) {
                        echo '<li>' . $tech . '</li>';
                    }
                    echo '</ul>';
                }
            echo '<div style="display: flex; justify-content: center; flex-direction: column; align-items: center;">';
                foreach($externalLinksList as $link) {

                    /*  'target=_blank': forces <a> to open into a new tab 
                        'rel="noopener noreferrer"': prevents new tab from modifying the original tab maliciously
                    */
                    echo '<a href=' . $link . ' target="_blank" rel="noopener noreferrer">' . 
                            '<button class="btn-info" style="border-color:' . $primaryCol . ';">'.$link["label"].'</button>'.
                            '</a>';
                }
            echo '</div></div>';

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
    };
?>


<?php include($themefolder . '/template.php'); ?>