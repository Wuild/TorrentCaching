<?php

include("init.php");

$mod = (isset($_GET['module'])) ? $_GET['module'] : "start";

define("CURRENT_MODULE", $mod);

$module = new Template(PATH_MODULE);
$content = $module->buildVar($mod . ".php");

$tpl = new Template(PATH_TEMPLATE);
$tpl->main_content = $content;
$tpl->build("template.php");
?>