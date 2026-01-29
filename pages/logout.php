<?php

include $_SERVER['DOCUMENT_ROOT'].'/project/lib/loade.php';
session::remove();
session::destroy();
header('Location:  /project/pages/index.php');
