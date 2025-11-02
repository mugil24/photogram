<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/project/class/database.class.php'; //this like include<stdio.h> to know the where the funtion  load_template is
include_once $_SERVER['DOCUMENT_ROOT'] . '/project/class/user.class.php'; //this like include<stdio.h> to know the where the funtion  load_template is
include_once $_SERVER['DOCUMENT_ROOT'] . '/project/class/session.class.php'; //this like include<stdio.h> to know the where the funtion  load_template is

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT'] . "/project/__template/$name.php";
}
