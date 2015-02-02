<div class="page-header">
    <h4>Upload torrent</h4>
</div>
We do not list or have any kind of search functions in the system,
You may only access a torrent by knowing its hash value of the torrent.<br/>
Any uploaded torrents does not get deleted.<br/><br/>

<?php
if (isset($_POST['upload'])) {

    try {

        if (!(isset($_FILES['torrent'])))
            throw new Exception("Missing torrent data");

        if (empty($_FILES['torrent']['name']))
            throw new Exception("No torrent file selected");

        $file = $_FILES['torrent'];

        $ext = explode(".", $file['name']);
        $ext = end($ext);

        if ($ext != "torrent")
            throw new Exception("A torrent file has to end with .torrent");

        $filetmp = $_FILES['torrent']['tmp_name'];

        $dict = Bcode::bdec_file($filetmp, filesize($filetmp));
        list($ann, $info) = Bcode::dict_check($dict, "announce(string):info");

        $infohash = strtoupper(sha1($info["string"]));
        $filename = $infohash;

        $file_path = _configs()->paths->torrents . $filename;
        $magnet_link = 'magnet:?xt=urn:btih:' . $infohash . "&tr=" . implode("&tr=", _configs()->trackers);

        if (move_uploaded_file($file['tmp_name'], $file_path . '.torrent')) {
            echo "<div class='alert alert-success'>The torrent has been successfully uploaded, to download it follow the link below<br />
			<a href='" . _configs()->website->url . $filename . "'>" . _configs()->website->url . $filename . "</a><br />
			<a href='" . $magnet_link . "'>Magnet link</a> | <a href='". _configs()->website->url . 'text/' . $filename . "'>Text</a> | 
			<a href='". _configs()->website->url . 'link/' . $filename . "'>Link</a></div>";
        }
    } Catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>

<h5>Select torrent file to upload</h5>
<form method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group">
        <div class="col-md-8">
            <input type="file" class="form-control" name="torrent"/><br/>
        </div>
        <div class="col-md-4">
            <input type="submit" name="upload" value="Upload" class="btn btn-success btn-block"/>
        </div>
    </div>
</form>

<h4>Legal</h4>
<ul>
    <li>We do not track any information about what content is on any torrent file</li>
    <li>We do not have any kind of search engine or listing system</li>
    <li>The original filename of a torrent is never saved.</li>
    <li>We do not log any ip adresses of uploaders or downloaders</li>
</ul>