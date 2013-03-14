Select torrent file to upload
<form method="post" enctype="multipart/form-data">
    <input type="file" name="torrent" /><br />
    <input type="submit" name="upload" value="Upload" />
</form>

<?php
if (isset($_POST['upload'])) {

    try {

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
