<?php

$config = new stdClass();

$config->website = new stdClass();
$config->website->name = "TorrentCaching";

$url = $_SERVER['HTTP_HOST'];
$url = rtrim($url, '/') . '/';
if (isset($_SERVER['HTTPS']))
    $url = "https://" . $url;
else if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == "https")
    $url = "https://" . $url;
else
    $url = "http://" . $url;

$config->website->url = $url;
$config->website->keywords = "torrent, cache, tfc, torrentcaching, caching";
$config->website->description = "Upload and cache torrent files.";

$config->paths = new stdClass();
$config->paths->root = dirname(__FILE__) . "/";
$config->paths->torrents = $config->paths->root . "torrents/";
$config->paths->library = $config->paths->root . "library/";
$config->paths->template = $config->paths->root . "template/";
$config->paths->pages = $config->paths->root . "pages/";

$config->trackers = array();
$config->trackers[] = "udp://tracker.openbittorrent.com:80/announce";
$config->trackers[] = "udp://tracker.publicbt.com:80";
$config->trackers[] = "udp://tracker.ccc.de:80";
$config->trackers[] = "udp://tracker.istole.it:80";

$config->system = new stdClass();
$config->system->debug = true;
$config->system->cleanurl = false;
$config->system->version = "0.2";

return $config;