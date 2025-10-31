<?php

function load_template($name)
{
    include $_SERVER['DOCUMENT_ROOT'] . "/project/__template/$name.php";
}

function signup($user, $email, $pass)
{
    // Disable MySQLi exceptions so errors go to $conn->error
    mysqli_report(MYSQLI_REPORT_OFF);

    $servername = "mariadb.selfmade.ninja";
    $username = "mugil24";
    $password = "Vaanmugil2403@";
    $dbname = "mugil24_webdata";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection manually

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `login_table` (`username`, `password`, `emailid`) /* */ 
            VALUES ('$user', '$pass', '$email')";

    // Run query and check
        $result = false;
    if ($conn->query($sql) === true) {
      $result = true;//if the data interset it will true
    } else {
        // This will now print the error properly
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    return $result;
}
