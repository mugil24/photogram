<?php

class database
{
    public static $connection = null;
    public static function getconnection()
    {
        if (database::$connection == null) {
            $servername = get_config("db_servername");
            $username =get_config("db_username");
            $password = get_config("db_password");
            $dbname = get_config("db_name");

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection manually

            if ($conn->connect_error) {
                // echo "ERROR IS -> ". $conn->connect_error;
                // database::$connection = $conn;//store the error in $connection
                // return database::$connection;//Return if any error 
                die("Connection failed: " . $conn->connect_error);

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
