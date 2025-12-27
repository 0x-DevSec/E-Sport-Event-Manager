<?php

require_once __DIR__ . '/../abstract/AbstractEntity.php';

class Club extends AbstractEntity
{
    private string $nom;
    private string $ville;
    private string $dateCreation;

    public function __construct(string $nom, string $ville, string $dateCreation)
    {
        $this->nom = $nom;
        $this->ville = $ville;
        $this->dateCreation = $dateCreation;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function getDateCreation(): string
    {
        return $this->dateCreation;
    }
}
