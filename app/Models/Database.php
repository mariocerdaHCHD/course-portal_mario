<?php
    namespace App\Models;
 
    class Database{
        //db connections and query methods 
        private $host;
        private $username;
        private $password;
        private $database;
        private $connection;
    
        public function __construct($server,$username,$password,$database){
            $this->server = $server;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
            $this->connect();
        }
        
        public function test(){
            echo "test";
        }
        private function connect() {
            $connectionOptions = array(
            "Database" => $this->database,
            "UID" => $this->username,
            "PWD" => $this->password);
            //serverName and connectionDBinfo is from tbDB.php
            $this->connection = sqlsrv_connect($this->server,$connectionOptions);
            if(!$this->connection){
                die("Connection failed: " . print_r(sqlsrv_errors(),true));
            }
        }
    
        //separating into two functions one with parameters and without
        public function query($sql) {
            $result = sqlsrv_query($this->connection,$sql);
            if(!$result){
                die("Query failed to execute: " . print_r(sqlsrv_errors(),true));
            }
            return $result;
        }

        public function query_param($sql,$param){
            $result = sqlsrv_query($this->connection,$sql,$param);
            if(!$result){
                die("Query failed to execute: " . print_r(sqlsrv_errors(),true));
            }
            return $result;
        }

        public function fetch_arr($results){
            return sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC);
            // $stmt;
        }
    }