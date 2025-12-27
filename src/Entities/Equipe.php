<?php

require_once __DIR__ . '/../abstract/AbstractEntity.php';

class Equipe extends AbstractEntity
{
    private string $nom;
    private string $jeu;
    private int $clubId;

    public function __construct(string $nom, string $jeu, int $clubId)
    {
        $this->nom = $nom;
        $this->jeu = $jeu;
        $this->clubId = $clubId;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getJeu(): string
    {
        return $this->jeu;
    }

    public function getClubId(): int
    {
        return $this->clubId;
    }
}
