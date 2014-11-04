<?php

include("init.php");

define("PAGE_URL", isset($_GET['page_url']) ? $_GET['page_url'] : "start");
define("PAGE_ACTION", isset($_GET['page_action']) ? $_GET['page_action'] : "main");


if (preg_match("/^([0-F]{40})\.torrent/i", PAGE_URL.".torrent") && file_exists(_configs()->paths->torrents . PAGE_URL.".torrent")) {
    $file = file_get_contents(_configs()->paths->torrents . PAGE_URL.".torrent");
    header('Content-Disposition: attachment; filename="' . PAGE_URL . '.torrent"');
    header("Content-Type: application/x-bittorrent");
    die($file);
} else {
    $tpl = new Template(_configs()->paths->template . "template.php");
    echo $tpl->Display();
}