<?php

class Database
{
    private string $host;
    private string $userName;
    private string $password;
    private string $dataBaseName;
    private ? mysqli $connection = null;

    public function __construct(
        string $host,
        string $userName,
        string $password,
        string $dataBaseName
    ) {
        $this->host = $host;
        $this->userName = $userName;
        $this->password = $password;
        $this->dataBaseName = $dataBaseName;
    }

    public function connect(): mysqli
    {
        if ($this->connection === null) {
            $this->connection = new mysqli(
                $this->host,
                $this->userName,
                $this->password,
                $this->dataBaseName
            );

            if ($this->connection->connect_error) {
                die("Database connection failed: " . $this->connection->connect_error);
            }
        }

        return $this->connection;
    }
}
