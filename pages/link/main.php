<div class="jumbotron">
	<?php
	$infohash = LINK_INFOHASH;
	if (file_exists(_configs()->paths->torrents . $infohash . '.torrent')) {
		$torrent_link = _configs()->website->url . $infohash;
		$text_link = _configs()->website->url . 'text/' . $infohash;
		$magnet_link = 'magnet:?xt=urn:btih:' . $infohash . '&tr=' . implode('&tr=', _configs()->trackers);?>
		
		<p style="text-align:center">To download the torrent with infohash<br />
		<?php echo LINK_INFOHASH ?><br />
		click one of the following links.</p>
		<a class="btn btn-lg btn-success" style="width:33%" href="<?php echo $torrent_link ?>">Torrent</a>
		<a class="btn btn-lg btn-success" style="width:33%" href="<?php echo $text_link ?>">Text</a>
		<a class="btn btn-lg btn-success" style="width:33%" href="<?php echo $magnet_link ?>">Magnet</a>

		<?php
	} else {
		echo "Torrent doesn't exist.  Did you forget to upload it?";
	}
	
	?>
</div>