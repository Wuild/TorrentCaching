<div class="jumbotron">
	<p><?php echo LINK_INFOHASH; ?></p>
</div>

<p>
	<?php
	$infohash = LINK_INFOHASH
	if (file_exists(_configs()->paths->torrents . $infohash . '.torrent') {
		$torrent_link = _configs()->website->url . $infohash;
		$text_link = _configs()->website->url . 'text/' . $infohash;
		$magnet_link = 'magnet:?xt=urn:btih:' . $infohash . '&tr=' . implode('&tr=', _configs()->trackers);
		
		echo "<a href=\"$torrent_link\">Torrent</a> | <a href=\"$text_link\">Text</a> | <a href=\"$magnet_link\">Magnet</a>";
	} else {
		echo "Torrent doesn't exist.  Did you forget to upload it?";
	}
	
	?>
</p>