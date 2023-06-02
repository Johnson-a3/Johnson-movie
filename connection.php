<?php

class database
{
    public static $conn;
    public static function db_connect(){
        $servername='localhost';
        $username= 'test_user';
        $password='w1llres0lve';
        $dbname='movie';

        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return database::$conn=$conn;

            }
            catch(PDOException $e)
            {
                echo "error message : ".$e->getMessage();
            }
    } 
    public static function closeConnection() {
        self::$conn = null;
    }
}


?>