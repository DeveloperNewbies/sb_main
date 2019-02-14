<?php
/**
 * Created by PhpStorm.
 * User: Mehmet
 * Date: 9.02.2019
 * Time: 18:50
 */

class database{
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "";
    public $conn;

    function __construct($dbname)
    {
        $this->dbname = $dbname ;

        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn-> exec("SET CHARACTER SET utf8");

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }


    function __destruct()
    {
        $this->conn = null;
    }
}

?>