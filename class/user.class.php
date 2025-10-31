<?php
class user{
    public  static function signup($user, $email, $pass)
{
    // Disable MySQLi exceptions so errors go to $conn->error
    mysqli_report(MYSQLI_REPORT_OFF);
    $conn = database::getconection();


    $sql = "INSERT INTO `login_table` (`username`, `password`, `emailid`) /* */ 
            VALUES ('$user', '$pass', '$email')";
    
    

    // Run query and check
    $result = false;
    if ($conn->query($sql) === true) {
        $result = true;
       
    } else {
        // This will now print the error properly
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //$conn->close();
    return $result;
}
}