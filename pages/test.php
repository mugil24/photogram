<?php
ini_set('display_errors', 1);




include_once $_SERVER['DOCUMENT_ROOT'] . '/project/lib/loade.php'; //this like include<stdio.h> to know the where the funtion  load_template is

$user1 = new user('nila');
$user1->setphoneno("+918056537523");
echo $user1->getphoneno();