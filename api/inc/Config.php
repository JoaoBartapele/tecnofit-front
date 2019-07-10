<?php

class Config
{
    protected $connection;
    public function __construct()
    {
        if (!isset($this->connection)) {
            $type = getenv('MAIN_DB_TYPE');
            $host = getenv('MAIN_DB_HOST');
            $name = getenv('MAIN_DB_NAME');
            $user = getenv('MAIN_DB_USER');
            $pass = getenv('MAIN_DB_PASSWORD');
            $this->connection = new PDO("{$type}:host={$host};port=3306;dbname={$name}", $user, $pass);
            if(!$this->connection){
                echo "Cannot connect to the database server";
            }
        }
        
        return $this->connection;
    }
}
