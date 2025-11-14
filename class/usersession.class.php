<?php
class usersession{
    /* 
    1.this is usersession is used  for session 
    2.when user login it will create session in information and store
    3.
    
    
                        |
                        v
    */
    public static function authandication($user,$pass){
        $username = user::login($user, $pass);
        $user = new user($username);
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $token = md5(rand(0, 9999).$id.$agent.time());
        $conn = database::getconnection();// database::getconnection();
        $sql="INSERT INTO `session_table` (`uid`, `token`, `login_time`, `ip`, `user_agent`)
            VALUES ('$user->id', '$token', now(), '$ip', '$agent')";
            if($conn->query($sql)){
                return $token;
            }
            else{
                return $conn->error;
            }
    }
     
    public function __construct($token){
        $this->conn = database::getconnection();
        $this->token = $token;
        $sql="SELECT * FROM `session_table` WHERE `token` = $token LIMIT 1";
        $result = $conn->query($sql);
        if($result->num_row==1){
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->uis = $row['uid'];
            $this->token = $row['token'];

        }else{
            throw new Exception("Session is invalid.");
        }
    }
      public function getUser()
    {
        return new User($this->uid);
    }


}