<?php

require_once __DIR__ . '/../abstract/AbstractCompetition.php';
require_once __DIR__ . '/../interfaces/StatsInterface.php';
require_once __DIR__ . '/../interfaces/ArchivableInterface.php';

class Tournoi extends AbstractCompetition implements StatsInterface, ArchivableInterface
{
    private string $titre;
    private float $cashprize;
    private string $format;
    private bool $archived = false;

    public function __construct(
        string $titre,
        float $cashprize,
        string $format,
        DateTime $date
    ) {
        parent::__construct($date);
        $this->titre = $titre;
        $this->cashprize = $cashprize;
        $this->format = $format;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function getCashprize(): float
    {
        return $this->cashprize;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function getStats(): array
    {
        return [
            'titre' => $this->titre,
            'cashprize' => $this->cashprize
        ];
    }

    public function archive(): void
    {
        $this->archived = true;
    }

    public function isArchived(): bool
    {
        return $this->archived;
    }

    public function getResult(): string
    {
        return "Tournoi terminé";
    }
}
