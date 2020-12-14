<?php

class Database
{
    private static $instance=null;
    /* Retourne une connexion à la base de donéees */
    public static function getPdo(): PDO
    {
        try
        {
            if(self::$instance === null)
            {
                self::$instance = new PDO('mysql:host=localhost;dbname=blogpoo','root', '1234', [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            }
        

        }
        catch(PDOException $pe)
        {
            echo 'ERREUR:'.$pe->getMessage();
        }

        return  self::$instance;
    }

}
