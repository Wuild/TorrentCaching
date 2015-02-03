<?php

include("init.php");

// index.php?link_type=(torrent|text|link)&infohash=B05930182B4FC941E73A4278FC612D154D5A822B

define("LINK_TYPE", isset($_GET['link_type']) ? $_GET['link_type'] : '');
define("LINK_INFOHASH", isset($_GET['infohash']) ? $_GET['infohash'] : '');
define("PAGE_ACTION", isset($_GET['page_action']) ? $_GET['page_action'] : "main");

if (LINK_TYPE == 'link')
	define("PAGE_URL", 'link');
else
	define("PAGE_URL", isset($_GET['page_url']) ? $_GET['page_url'] : "start");

if (file_exists(_configs()->paths->torrents . LINK_INFOHASH. '.torrent') && preg_match("/^[0-F]{40}/i", LINK_INFOHASH)) {
	if (LINK_TYPE == 'torrent' || LINK_TYPE == 'text' || LINK_TYPE == '') {
		$file = file_get_contents(_configs()->paths->torrents. LINK_INFOHASH. '.torrent');
		if (LINK_TYPE == 'text') {
			header('Content-Disposition: attachment; filename="'. LINK_INFOHASH. '.txt"');
			header('Content-Type: text/plain');
		} else {
			header('Content-Disposition: attachment; filename="'. LINK_INFOHASH. '.torrent"');
			header('Content-Type: application/x-bittorrent');
		}
		die($file);
	} else {
		$tpl = new Template(_configs()->paths->template. 'template.php');
		echo $tpl->Display();
	}
} else {
	$tpl = new Template(_configs()->paths->template. 'template.php');
	echo $tpl->Display();
}
