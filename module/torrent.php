<?php

if (!isset($_GET['var_a']))
    die("missing torrent name");

$filename = $_GET['var_a'];

if(!file_exists(PATH_TORRENTS.$filename))
    die("torrent file does not exists");    



$file = file_get_contents(PATH_TORRENTS.$filename);


header('Content-Disposition: attachment; filename="' . $filename . '"');
header("Content-Type: application/x-bittorrent");

die($file);

?>
