<?php

class DataBase {
    
    public static $instance;
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=' . $_ENV['mysql_host'] . ';
              dbname=' . $_ENV['mysql_dbname'], $_ENV['mysql_user'], $_ENV['mysql_pass'], array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        
        return self::$instance;
    }
    
}


?> 