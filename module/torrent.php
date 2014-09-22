<?php

if (!isset($_GET['var_a']))
    die("missing torrent name");

$filename = basename($_GET['var_a']);

if( preg_match("/^([0-F]{40})\.torrent$/", $filename) != 1 ||  !file_exists(PATH_TORRENTS.$filename) ) {
    header("HTTP/1.1 404 Not Found");
    die("Torrent file does not exist!");
} 

$file = file_get_contents(PATH_TORRENTS.$filename);

header('Content-Disposition: attachment; filename="' . $filename . '"');
header("Content-Type: application/x-bittorrent");

die($file);

?>
