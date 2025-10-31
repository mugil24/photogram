<?php

class database
{
    public static $connection = null;
    public static function getconection()
    {
        if (database::$connection == null) {
            $servername = "mariadb.selfmade.ninja";
            $username = "mugil24";
            $password = "Vaanmugil2403@";
            $dbname = "mugil24_webdata";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection manually

            if ($conn->connect_error) {
                

                die("Connection failed: " . $conn->connect_error);
                // print_r($con->connect_error);
            } else {
                database::$connection = $conn;
                return database::$connection;
            }


        } else {
            return database::$connection;
        }

    }

}
