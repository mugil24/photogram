<?php

class usersession
{
    /*
     the authandication is used for verfy the user like correct pass  and user name and alse used for create the user session
     it will generate the token for the user current user.
    */

    public static function authandication($user, $pass)
    {
        if ($username = user::login($user, $pass)) {//return username

            $user = new user($username);//using that user name it will create object
            if (session::get("fingerprint")) {

                $fingerprint = session::get("fingerprint");
            }
            else{
                $fingerprint = "sdgfxhcjk";
            }
            $ip = $_SERVER['REMOTE_ADDR'];//ip of user
            $agent = $_SERVER['HTTP_USER_AGENT'];//user agent of user
            $token = md5(rand(0, 9999).$ip.$agent.time());// token for user
            $conn = database::getconnection();// database::getconnection();
            $sql = "INSERT INTO `session_table` (`uid`, `token`, `lastactive_time`, `login_time`, `ip`, `user_agent`, `fingerprint`,`active`)
            VALUES ('$user->id', '$token',now(), now(), '$ip', '$agent','$fingerprint','1')";
            if ($conn->query($sql)) {
                session::set("token", $token);
                return  $token;
            } else {
                return $conn->error;
            }
        } else {
            return false;
        }
    }
    /*
    authorize is used for check and avoid session hijacking every to relode it will check
     user agent and ip active and valid or not

    */
    public static function authorize($token)
    {

        $session = new usersession($token);

        if (isset($_SERVER['REMOTE_ADDR']) && isset($_SERVER['HTTP_USER_AGENT'])) {
            if ($session->isvalide() and $session->isactive()) {//check active and user online but no use in webapplication and isvalid .
                if ($session->getip() === $_SERVER['REMOTE_ADDR']) {//check current ip and after relode ip .
                    if ($_SERVER['HTTP_USER_AGENT'] === $session->useragent()) {//check current useragent and relode useragent.
                        $session->update_lastactive();
                        return true;
                    } else {
                        return false;
                    }

                } else {
                    return false;
                }

            } else {
                return false;
            }

        } else {
            return false;
        }

    }
    /*
    this construction is user for using token get other information from database if token not
    in database session session ninvalide.


    */

    public function __construct($token)
    {
        $this->conn = database::getconnection();
        $this->token = $token;
        $sql = "SELECT * FROM `session_table` WHERE `token` = '$token' LIMIT 50";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->uid = $row['uid'];

        }
    }
    //get ip fromcurrent user;
    public function getip()
    {
        return isset($this->data['ip']) ? $this->data['ip'] : false;
    }
    public function useragent()
    {
        return isset($this->data['user_agent']) ? $this->data['user_agent'] : false;


    }
    public function getfingerprint()
    {
        return  isset($this->data['fingerprint']) ? $this->data['fingerprint'] : false;
    }
    public function isactive()
    {
        return (isset($this->data['active']) && $this->data['active'] == 1);
    }
    //check the user working in webpage if weorking simple no action take if no action in page logout the page and destrouy the session.
    public function isvalide()
    {
        if (isset($this->data['lastactive_time'])) {
            $lastactive_time = DateTime::createFromFormat('Y-m-d H:i:s', $this->data['lastactive_time']);
            if (time() - $lastactive_time->getTimestamp() <= 10) {
                return true;
            } else {
                return $this->logout();
            }
        } else {
            return false;
        }

    }
    public function update_lastactive()// it will is used for update the lastactive time in webpage.
    {
        if (isset($this->data['lastactive_time'])) {
            $this->conn = database::getconnection();
            $sql = "UPDATE `session_table` SET `lastactive_time` = now() WHERE `token` = '$this->token'";
            if ($this->conn->query($sql)) {
                return true;

            } else {
                return false;
            }

        }
    }
    /* it will help remove session when hacker try to session hijacking and  remove session */
    public function sessionremove()
    {
        if (!$this->conn) {
            $this->conn = database::$connection();
        }
        $uid = $this->data['uid'];
        $sql = "DELETE FROM `session_table` WHERE ((`uid` = '$uid'));";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function logout()
    {
        $this->sessionremove();
        session::destroy();
        //return true;
    }

}
