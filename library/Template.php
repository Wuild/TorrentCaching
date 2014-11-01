<?php

class Template
{
    private $_path = null;
    private $_vars = array();

    function __construct($path)
    {
        $this->_path = $path;
    }

    function __set($name, $value)
    {
        $this->_vars[$name] = $value;
    }

    function __get($name)
    {
        if (isset($this->_vars[$name]))
            return $this->_vars[$name];
    }

    function Display()
    {
        if (file_exists($this->_path)) {
            ob_start();
            include($this->_path);
            $data = ob_get_contents();
            ob_clean();
            return $data;
        } else {
            error_log("Template file not found");
        }
    }
}

?>