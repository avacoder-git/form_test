<?php

include("config.php");


class Database{

    public $connection;

    public function __construct()
    {
        $this->open_db();
    }

    public function open_db(){
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        if ($this->connection->connect_errno)
        {
            die("Database error!");
        }
    }

    public function query($sql){
        $result = mysqli_query($this->connection,$sql);

        if(!$result)
        {
            die("Query_failed");
        }
        return $result;


    }

    public function escape_string($string)
    {
        return mysqli_real_escape_string($this->connection,$string);


    }
    


}


$database = new Database();



?>