<?php

class session
{
    public static function start()
    {
        session_start();
    }
    public static function destroy()
    {
        session_destroy();
    }
    public static function unset()
    {
        session_unset();
    }
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public static function unset_key($key)
    {
        unset($_SESSION[$key]);
    }
    public static function isset($key)
    {
        return isset($_SESSION[$key]);
    }
    public static function get($key)
    {
        return ($_SESSION[$key]);
    }

}
