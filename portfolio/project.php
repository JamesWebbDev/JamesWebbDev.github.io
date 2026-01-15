
<?php
    /* $_GET fetches the name of the project sent by the <a> tags in 'template.php' e.g. 'avs' */
	$title = $_GET["project"];
    $dns = 'jameswebdev.info';
	$datafolder = 'data'; // Data folder, pointed to from root
	$themefolder = 'theme'; // Theme folder, pointed to from root
    $embedstyle = '';
    $embedscript = '  ';
    $content = '

    ';
    $contentsecond = '';
?>


<?php
    /* Include to defined variables above, inside of 'projecttemplate.php' */
    include($themefolder . '/projecttemplate.php'); 
?>