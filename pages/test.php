<?php

include $_SERVER['DOCUMENT_ROOT'].'/project/lib/loade.php';


session::start();

session::set("mugil", "mugil2403");
echo session::get("mugil");
