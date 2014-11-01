<?php

session_start();
ob_start("ob_gzhandler");
ini_set("display_errors", true);
error_reporting(E_ALL);
set_error_handler("errorHandler");

function __autoload($classname)
{
    if (file_exists(_configs()->paths->library . $classname . ".php")) {
        include_once(_configs()->paths->library . $classname . ".php");
    } else {
        trigger_error("Could not find library class file $classname.php");
    }
}

function errorHandler($errno, $errstr, $errfile, $errline)
{
    $msg = "[$errno] $errstr<br>";
    $msg .= "Error on line $errline in $errfile<br>";
    die($msg);
}

function _configs()
{
    return include("configs.php");
}

function cleanUrl($text)
{
    $text = preg_replace_callback('/([^a-zA-Z0-9\s])/i', function () {
        return '';
    }, $text);
    $text = preg_replace_callback('/([\s])/i', function () {
        return '-';
    }, $text);
    return $text;
}
