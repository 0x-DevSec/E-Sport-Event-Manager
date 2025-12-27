<?php

class SponsorRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function create(Sponsor $sponsor): void
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO sponsors (nom) VALUES (?)"
        );
        $stmt->bind_param("s", $sponsor->getNom());
        $stmt->execute();
    }

    public function findAll(): array
    {
        $result = $this->conn->query("SELECT * FROM sponsors");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
