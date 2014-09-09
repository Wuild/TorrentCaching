<h5>Upload torrent with cURL and PHP</h5>
<pre class="prettyprint" id="html">
$post_data = array(
    "upload" => true, // Don't change
    "torrent" => "@/path/to/torrent/dexter.s03.e07.torrent"   // Full path for file to upload
);

$ch = curl_init("<?php echo URL; ?>api/upload.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$result = curl_exec($ch);
curl_close($ch);
$json = json_decode($result);

if (!$json->error){
    echo $json->message;
    echo $json->url;
}else if($json->error){
    echo $json->message;
}
</pre>

<h5>Json return code</h5>
<pre><?php
    $array = array(
        "error" => false,
        "message" => "The torrent has been successfully uploaded",
        "url" => URL . "torrent/" . strtoupper(sha1("dexter.s03.e07")).".torrent",
        "magnet" => "magnet:?xt=urn:btih:" . strtoupper(sha1("dexter.s03.e07")) . $MAGNET_TRACKERS
    );
echo json_encode($array);
    ?>
</pre>