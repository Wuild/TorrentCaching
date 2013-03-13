<?php

include("init.php");

$mod = (isset($_GET['module'])) ? $_GET['module'] : "start";

define("CURRENT_MODULE", $mod);

ob_start();
if (file_exists(PATH_MODULE . $mod . ".php"))
    include(PATH_MODULE . $mod . ".php");
else
    echo "The page your trying to access does not exists";
$content = ob_get_contents();
ob_end_clean();

$tpl = new Template(PATH_TEMPLATE);
$tpl->main_content = $content;
$tpl->build("template.php");
?>