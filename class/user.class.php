<?php

class user
{
    private $conn;
    /* 
    1.__call is magic function if dont know plz refer php document
    2.it will getfirst three letter and make it like snake if firstName to this like this first_name 
    3.if get  return $this->getdata($property); else set return $this->setdata($property, $argument[0]);
    */
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
        $sql = "SELECT * FROM `login_table` WHERE `username` = '$email' OR `emailid` = '$email' LIMIT 1";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row["password"])) 
            { 
                return true;
                return $row['username'] ;
            } else 
            {
                return ( "Uh-oh! Your email or password is incorrect.");
            }
        } else {

            return "Uh-oh! Your email or password is incorrect.";
        }

    }
    /* how it work
    1. This construction help to creat user object to get and set data in usertable
    2. when we construct it $this->id=$id it will featch the id of user in login table and store in this of id
    3.using forgine key all id link with logint table id so user id and bio id are same so get the bio of current user
                            |
                            v
    */
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
        /*how its works 
        1.if var is bio if not connection it will get connection
        2.when we construct this of is user id so user id and user bio id are same beacuse of forgine key
        3.fetch using id and store in result and retrurn $var
            |
            v
        */
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
    /* 
    1.if var is bio and $data is some data like (my name !!!!) if not connection it willget connection
    2.this of id means userid (if u dont know scorlle up)!!!
    3.if set data it will return true else
    
                        |
                        v
    */

    public function setdata($var, $data)
    {
        if (!$this->conn) {
            $this->conn = database::getconnection();
        }
        $sql = "UPDATE `user_table` SET `$var`='$data' WHERE `id`='$this->id'";// it set the value $var('bio') and $data means some data id which id
        if ($this->conn->query($sql)) {
            return true;
        } else {
            throw new Exception($this->conn->error);
        }

    }

}
