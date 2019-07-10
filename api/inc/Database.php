<?php

class Database extends Config {

    public function __construct()
    {
        parent::__construct();
    }

    public function getData($query, $param = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($param);
        return $statement->fetchAll();
    }

    public function getRow($query, $param = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($param);
        return $statement->fetch();
    }

    public function getOne($query, $param = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($param);
        return $statement->fetchColumn();
    }

    public function execute($query, $param = [])
    {
        $statement = $this->connection->prepare($query);
        return $statement->execute($param);
    }

    public function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

}