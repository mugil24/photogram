<?php

class user
{
    private $conn;
    public function __call($name, $argument)
    {
        $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
        $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));


        if (substr($name, 0, 3) == "get") {
            return $this->getdata($property);

        } elseif (substr($name, 0, 3) == "set") {
            return $this->setdata($property, $argument[0]);
        }
    }
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
            if (password_verify($pass, $row["password"])) 
            {
                return true;
            } else 
            {
                return "Uh-oh! Your email or password is incorrect.";
            }
        } else {

            return "Uh-oh! Your email or password is incorrect.";
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
        $sql = "SELECT `$var` FROM `user_table` WHERE `id` = '$this->id' "; // selsect the bio for id userid $var is like bio or dob
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            return $row = $result->fetch_assoc()[$var];
        } else {
            echo $this->conn->error;
        }


    }

    public function setdata($var, $data)
    {
        if (!$this->conn) {
            $this->conn = database::getconnection();
        }
        $sql = "UPDATE `user_table` SET `$var`='$data' WHERE `id`='$this->id'";// it set the value $var('bio') and $data means some data id which id
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }

    }

}
