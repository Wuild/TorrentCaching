<h4>Upload torrent</h4>
We do not list or have any kind of search functions in the system,
You may only access a torrent by knowing its hash value of the torrent.<br />
Any uploaded torrents does not get deleted.<br /><br />

<h5>Select torrent file to upload</h5>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="torrent" /><br />
    <input type="submit" name="upload" value="Upload" />
</form>

<h4>Legal</h4>
<ul>
    <li>We do not track any information about what content is on any torrent file</li>
    <li>We do not have any kind of search engine or listing system</li>
    <li>The original filename of a torrent is never saved.</li>
    <li>We do not log any ip adresses of uploaders or downloaders</li>
</ul>

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
        $filename = $infohash . ".torrent";

        $file_path = PATH_TORRENTS . $filename;

        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            echo "<br /><br />The torrent has been successfully uploaded, to download it follow the link below<br />  <a href='" . URL . "torrent/$filename'>" . URL . "torrent/" . $filename . "</a>";
        }
    } Catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
