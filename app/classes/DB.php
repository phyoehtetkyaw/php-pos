<?php

class DB
{
    private $host = "mysql";
    private $user = "root";
    private $password = "root";
    private $db = "pos_php";

    public function connect() 
    {
        try {
            $pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->db.";", $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}