<?php

ini_set("display_errors", true);
error_reporting(E_ALL);

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
