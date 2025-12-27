<?php

require_once __DIR__ . '/../abstract/AbstractEntity.php';

class Sponsor extends AbstractEntity
{
    private string $nom;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }
}
