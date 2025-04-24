<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'root';
    private $db = 'lodgereservation';
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die('Connection error: ' . $this->conn->connect_error);
        }
    }

    public function query(string $query, string $types = null, array $params = null)
    {
        // prepare a statement
        $stmt = $this->conn->prepare($query);
        // bind parameters if needed
        if ($params) {
            $stmt->bind_param($types, ...$params);
        }
        // execute the query
        $stmt->execute();
        // return results if needed
        if (str_contains($query, 'SELECT')) {
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        // otherwise return the number of affected rows
        return $stmt->affected_rows;
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}