<?php

class ClubRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function create(Club $club): void
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO clubs (nom, ville, date_creation) VALUES (?, ?, ?)"
        );

        $nom = $club->getNom();
        $ville = $club->getVille();
        $date = $club->getDateCreation();

        $stmt->bind_param("sss", $nom, $ville, $date);
        $stmt->execute();
    }

    public function findAll(): array
    {
        $result = $this->conn->query("SELECT * FROM clubs");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
