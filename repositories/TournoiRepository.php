<?php

class TournoiRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function create(Tournoi $tournoi): void
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO tournois (titre, cashprize, format, date)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "sdss",
            $tournoi->getTitre(),
            $tournoi->getCashprize(),
            $tournoi->getFormat(),
        );
        $stmt->execute();
    }

    public function findAll(): array
    {
        $result = $this->conn->query("SELECT * FROM tournois");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
