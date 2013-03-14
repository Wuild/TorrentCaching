<?php

header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

ini_set("display_errors", true);
error_reporting(E_ALL);

define("SYSTEM_VERSION", "0.1");

include("config.php");

if (!is_dir(PATH_TORRENTS))
    if (!mkdir(PATH_TORRENTS))
        die("could not create path " . PATH_TORRENTS);

if (!is_writable(PATH_TORRENTS))
    die(PATH_TORRENTS . " is not writable");

/**
 * Auto load class files
 * @param string $classname
 */
function __autoload($classname) {
    if (file_exists(PATH_LIBRARY . $classname . ".php"))
        include_once(PATH_LIBRARY . $classname . ".php");
    else
        trigger_error("Could not load class &quot;$classname&quot; from library");
}

?>
