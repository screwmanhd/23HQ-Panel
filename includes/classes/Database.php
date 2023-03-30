<?php

// This class contains the basic PDO database connection, which is used many other classes, to separate it from other classes, it was put here

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection()
    {
        if (self::$connection === null) {
            self::$connection = new PDO('mysql:host=localhost;dbname=app', 'root', 'usbw');
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }
}