<?php

require_once __DIR__ . '/../abstract/AbstractEntity.php';
require_once __DIR__ . '/../interfaces/StatsInterface.php';

class Joueur extends AbstractEntity implements StatsInterface
{
    private string $pseudo;
    private string $role;
    private float $salaire;
    private int $equipeId;

    public function __construct(string $pseudo, string $role, float $salaire, int $equipeId)
    {
        $this->pseudo = $pseudo;
        $this->role = $role;
        $this->salaire = $salaire;
        $this->equipeId = $equipeId;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getSalaire(): float
    {
        return $this->salaire;
    }

    public function getEquipeId(): int
    {
        return $this->equipeId;
    }

    public function getStats(): array
    {
        return [
            'pseudo' => $this->pseudo,
            'salaire' => $this->salaire
        ];
    }
}
