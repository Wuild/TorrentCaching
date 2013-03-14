<?php

/**
 * Copyright (C) Wuild.com - All Rights Reserved
 *
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 * 
 * @author Wuild
 * @package Invent
 */
class Template {

    /**
     * path to template folder
     * @var string 
     */
    public $path = "";

    /**
     * loaded Files
     * @var string 
     */
    private $files = array();

    /**
     * data to return
     * @var string 
     */
    public $data = "";

    /**
     * template variables
     * @var array
     */
    private $vars = array();

    /**
     * page title
     * @var string 
     */
    public $title = "";

    /**
     * show sidebar
     * @var boolean
     */
    public $sidebar = false;

    /**
     * javascripts
     * @var array 
     */
    public $javascript = array();

    /**
     * stylesheets
     * @var array
     */
    public $css = array();

    /**
     * Admin menus
     * @var array 
     */
    public $menu = array();

    /**
     * Set the path to the template
     * @param string $path
     */
    function __construct($path) {
        $this->path = $path;
    }

    /**
     * Set a template variable that can be used by using the __get() function
     * @param string $name variable name
     * @param string $value variable value
     */
    function __set($name, $value) {
        $this->vars[$name] = $value;
    }

    /**
     * Get a template variable by using $template->variable or inside a template $this->variable
     * @param string $name 
     * @return string returns the value of the variable
     */
    function __get($name) {
        return $this->vars[$name];
    }

    /**
     * Build the selected template or loaded templates.
     * @param string file build file, leave empty if using loadFile function
     */
    function build($file = "") {
        try {
            if (count($this->files) > 0) {
                foreach ($this->files as $file) {
                    if (file_exists($this->path . $file))
                        include($this->path . $file);
                    else
                        include(PATH_MODULE . "error.php");
                }
            }else {
                if (file_exists($this->path . $file))
                    include($this->path . $file);
                else
                    include(PATH_MODULE . "error.php");
            }
        } Catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Build the loaded templates into a variable
     * @return string returns the templates as a variable
     */
    function buildVar($file = "") {
        ob_start();
        if (file_exists($this->path . $file))
            include($this->path . $file);
        else
            include(PATH_MODULE . "error.php");

        $this->data .= ob_get_contents();
        ob_end_clean();

        return $this->data;
    }

}

?>
