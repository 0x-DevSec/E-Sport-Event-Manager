<?php

class EquipeRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function create(Equipe $equipe): void
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO equipes (nom, jeu, club_id) VALUES (?, ?, ?)"
        );

        // FIX: store values in variables
        $nom = $equipe->getNom();
        $jeu = $equipe->getJeu();
        $clubId = $equipe->getClubId();

        $stmt->bind_param("ssi", $nom, $jeu, $clubId);
        $stmt->execute();
    }

    public function findAll(): array
    {
        $result = $this->conn->query("
            SELECT equipes.*, clubs.nom AS club_nom
            FROM equipes
            JOIN clubs ON clubs.id = equipes.club_id
        ");

        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
