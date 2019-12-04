<?php
class Database extends Env {
    public static $instance;
    public static function Connect() {
        
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=' . Env::Config()->mysql_host . ';
              dbname=' . Env::Config()->mysql_dbname, Env::Config()->mysql_user, Env::Config()->mysql_pass, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        
        return self::$instance;
    }
}
?>