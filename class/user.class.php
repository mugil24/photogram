<?php

class user
{
    private $conn;
    public static function signup($user, $email, $pass)
    {
        // Disable MySQLi exceptions so errors go to $conn->error
        mysqli_report(MYSQLI_REPORT_OFF);
        $conn = database::getconnection();
        $options = [
            'cost' => 8,
        ];
        $pass = (password_hash($pass, PASSWORD_DEFAULT, $options));


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
    public static function login($email, $pass)
    {

        $conn = database::getconnection();
        $sql = "SELECT * FROM `login_table` WHERE `emailid` = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row["password"])) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }
    public function __construct($username)
    {
        $this->username = $username;
        $this->conn = database::getconnection();
        $sql = "SELECT * FROM `login_table` WHERE `username` = '$this->username'";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
        } else {
            throw new Exception("Username does't exist");

        }
    }

    public function getdata($var)
    {
        if (!$this->conn) {
            $this->conn = database::getconnection();
        }
        $sql = "SELECT `$var` FROM `user_table` WHERE `id` = '$this->id' LIMIT 50"; // selsect the bio for id userid
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            return $row = $result->fetch_assoc()[$var];
        } else {
           echo false;
        }


    }

    public function setdata($var, $data)
    {
        if (!$this->conn) {
            $this->conn = database::getconnection();
        }
        $sql = "UPDATE `user_table` SET `$var`='$data' WHERE `id`='$this->id'";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }

    }
    public function setfirstname($firstname)
    {
        $this-> setdata('firstname', $firstname);
    }

    public function getfirstname()
    {
        return $this->getdata('firstname');
    }

    public function setbio($bio)
    {
        $this->setdata('bio', $bio);
    }
    public function getbio()
    {
        return $this->getdata('bio');
    }
    public function setphoneno($phone)
    {
        $this->setdata('phone no', $phone);
    }
    public function getphoneno()
    {
        return $this->getdata('phone no');
    }


}
