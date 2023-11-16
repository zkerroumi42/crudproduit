<?php 
class Database{
    private static $dbname = "site_ecomerce";
    private static $dbhostname="localhost";
    private static $dbuser = "root";
    private static $dbpass = "";


    private static $conn=null;

    public function __construct() {
        die("Init function is not allowed");
    }
    public static function connect(){
        if ( null == self::$conn) {

        try {

            self::$conn=new PDO('mysql:host='.self::$dbhostname.';dbname='.self::$dbname,self::$dbuser,self::$dbpass);

        } catch (PDOException $e) {

            echo $e->getMessage();

        }
    }
        return self::$conn;
    }

    public static function disconnect(){
        self::$conn=null;
    }

    

}
?>