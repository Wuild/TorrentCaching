<?php

include("../init.php");

if (isset($_POST['upload'])) {

    try {

        if (!isset($_FILES['torrent']))
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
            $array = array(
                "error" => false,
                "message" => "The torrent has been successfully uploaded",
                "url" => URL . "torrent/" . $filename
            );
            die(json_encode($array));
        }
    } Catch (Exception $e) {
        $array = array(
            "error" => true,
            "message" => $e->getMessage()
        );
        die(json_encode($array));
    }
}
?>
