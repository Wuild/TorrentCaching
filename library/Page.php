<?php

class Page extends stdClass
{

    private $_page_url = "start";
    private $_page_action = "main";

    function __construct($page_url, $page_action = "main")
    {
        $this->_page_url = $page_url;
        $this->_page_action = $page_action;
    }

    function Build()
    {
        if (file_exists(_configs()->paths->pages . $this->_page_url . "/" . $this->_page_action . ".php")) {
            ob_start();
            include(_configs()->paths->pages . $this->_page_url . "/" . $this->_page_action . ".php");
            $data = ob_get_contents();
            ob_clean();
            return $data;
        } else {
            return "Page file not found";
        }
    }

    static function Url($url, $args = array())
    {
        $a = cleanUrl($url) . "/";
        $i = 0;
        foreach ($args as $name => $value) {
            $tag = ($i == 0) ? "?" : "&";
            $a .= $tag . cleanUrl($name) . "=" . cleanUrl($value);
            $i++;
        }
        return $a;
    }
}