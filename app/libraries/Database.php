<?php
/**
 * This will be the reference description of the class
 * Database Class
 * - PDO Class
 * - CRUD 
 * - COUNT
 * - Connect
 * - Create Prepared statement
 * - Bind Values
 * - Return Rows and Results
 */

 class Database {
     private $host = DB_HOST;
     private $user = DB_USER;
     private $pass = DB_PASS;
     private $dbname = DB_NAME;

     private $dbh;
     private $stmt;
     private $error;

    /**
     * Create Database connection
     */
    public function __construct() {
        // set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=UTF8';
        // Set PDO Default Attributes Options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            // create database instance
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            /*
            $dbh = new PDO($dsn, $this->user, $this->pass, $options);
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue();
            $stmt->execute();
            */
            
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
     }
    
    /**
     * This is important to make sure database conenction
     * and query is closed properly
     * will be call when the object is no longer called
     */
    public function __destruct(){
        echo '<br>database connection closed gracefully.<br>';
        if(!empty($this->dbh)){
            $this->dbh = null;
        }

        if(!empty($this->stmt)){
            $this->stmt = null;
        }
    }

     /**
      * Prepare statement with query
      */
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * Bind Values
     * - check for type
     * - bind value
     */
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * Execute the prepared statement
     */
    public function execute(){
        return $this->stmt->execute();
    }

    /**
     *  Get result set as an array of object
     */
    public function resultSet(){
        //echo 'resultSet()<br>';
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Fetch a single row
     */
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Get row count from the previous result
     */
    public function rowCount(){
        return $this->stmt->rowCount();
    }


 }