<?php

class JoueurRepository
{
    private mysqli $conn;

    public function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function create(Joueur $joueur): void
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO joueurs (pseudo, role, salaire, equipe_id)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "ssdi",
            $joueur->getPseudo(),
            $joueur->getRole(),
            $joueur->getSalaire(),
            $joueur->getEquipeId()
        );
        $stmt->execute();
    }

    public function findByEquipe(int $equipeId): array
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM joueurs WHERE equipe_id = ?"
        );
        $stmt->bind_param("i", $equipeId);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
