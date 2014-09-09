<?php

define("URL", "http://mywebsite.com/");

//Absolute path to this file
define("PATH_ROOT", dirname(__FILE__) . "/");
define("PATH_TEMPLATE", PATH_ROOT . "template/");
define("PATH_LIBRARY", PATH_ROOT . "library/");
define("PATH_MODULE", PATH_ROOT . "module/");


//Absolute path to where to store torrent files
define("PATH_TORRENTS", PATH_ROOT . "files/");

$magnet_trackers[] = "http://tracker.mrdrsr.net:6969/announce";
$magnet_trackers[] = "udp://tracker.openbittorrent.com:80/announce";
$magnet_trackers[] = "udp://tracker.publicbt.com:80";
$magnet_trackers[] = "udp://tracker.ccc.de:80";
$magnet_trackers[] = "udp://tracker.istole.it:80";
$trackers = '&tr=' . implode('&tr=', $magnet_trackers);

define("MAGNET_TRACKERS", $trackers);
?>
