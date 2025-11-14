<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/project/class/database.class.php'; //this like include<stdio.h> to know the where the funtion  load_template is
include_once $_SERVER['DOCUMENT_ROOT'] . '/project/class/user.class.php'; //this like include<stdio.h> to know the where the funtion  load_template is
include_once $_SERVER['DOCUMENT_ROOT'] . '/project/class/session.class.php'; //this like include<stdio.h> to know the where the funtion  load_template is
include_once $_SERVER['DOCUMENT_ROOT'] . '/project/class/usersession.class.php';

global $__site_config;//its global variable
//Note: Change this path if you run this code outside lab.
$__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../photogramconfig.json');

Session::start();//it will start the session

function get_config($key, $default=null)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}




function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT'] . "/project/__template/$name.php";
}
