<?php

class database
{
    public static $connection = null;
    public static function getconnection()
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
                database::$connection = $conn;//store the error in $connection
                return database::$connection;//Return if any error 


                //die("Connection failed: " . $conn->connect_error);

            } else {
                database::$connection = $conn;
                return database::$connection;//return mysqli object if connection open
            }


        } else {

            return database::$connection;
            /* return mysqli object if connection open and show it open two time in same page*/       
 }

    }

}
