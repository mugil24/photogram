<?php
include $_SERVER['DOCUMENT_ROOT'].'/project/lib/loade.php';

if (isset($_POST['fingerprint']) && $_POST['fingerprint'] !== '') {
    session::set('fingerprint', $_POST['fingerprint']);
    //http_response_code(200);
    //echo 'ok';
 }// else {
//     http_response_code(400);
// }
