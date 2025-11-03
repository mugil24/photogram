<?php


class user
{
    private $conn;
    public static function signup($user, $email, $pass)
    {
        // Disable MySQLi exceptions so errors go to $conn->error
        mysqli_report(MYSQLI_REPORT_OFF);
        $conn = database::getconnection();
        $pass = md5($pass);
        $pass = $pass = md5(strrev(md5($pass)));

        $sql = "INSERT INTO `login_table` (`username`, `password`, `emailid`) /* */ 
            VALUES ('$user', '$pass', '$email')";



        // Run query and check
        $result = false;
        if ($conn->query($sql) === true) { //$conn->query($sql) this will the data interst or not return 1 or 0;
            $result = true;

        } else {
            // if any error show store in result
            $result = $conn->error;
        }

        //$conn->close();
        return $result;
    }

    public function authenticate()
    {
    }

    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    public function getBio()
    {
    }

    public function setAvatar()
    {
    }

    public function getAvatar()
    {
    }

}
