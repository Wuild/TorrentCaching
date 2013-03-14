<?php
$action = (isset($this->type)) ? $this->type : "404";

switch ($action) {
    default:
    case '404':
        ?>
        <h4>Error 404</h4>
        The page your trying to access could not be found.<br />Check the url and try again.
        <?php
        break;
}
?>
