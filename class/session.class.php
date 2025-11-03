<?php

class session
{
    public static function start()// this start the session
    {
        session_start();
    }
    public static function destroy()// this is destroy the session
    {
        session_destroy();
    }
    public static function unset()//this is unset all the variable in session
    {
        session_unset();
    }
    public static function set($key, $value) //set the like user name and pass
    {
        $_SESSION[$key] = $value;
    }
    public static function unset_key($key)//unset single key
    {
        unset($_SESSION[$key]);
    }
    public static function isset($key)//check the keyexist if 1 else 0
    {
        return isset($_SESSION[$key]);
    }

    public static function get($key, $default=false)//check if key exist if return value else default value
    {
        if (Session::isset($key)) {
            return $_SESSION[$key];
        } else {
            return $default;
        }
    }


}
