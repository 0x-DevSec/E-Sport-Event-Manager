<?php

require_once __DIR__ . '/../abstract/AbstractCompetition.php';
require_once __DIR__ . '/../interfaces/ArchivableInterface.php';

class MatchGame extends AbstractCompetition implements ArchivableInterface
{
    private int $equipeAId;
    private int $equipeBId;
    private int $scoreA;
    private int $scoreB;
    private int $gagnantId;
    private bool $archived = false;

    public function __construct(
        int $equipeAId,
        int $equipeBId,
        int $scoreA,
        int $scoreB,
        int $gagnantId,
        DateTime $date
    ) {
        parent::__construct($date);
        $this->equipeAId = $equipeAId;
        $this->equipeBId = $equipeBId;
        $this->scoreA = $scoreA;
        $this->scoreB = $scoreB;
        $this->gagnantId = $gagnantId;
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
        return $this->scoreA . " - " . $this->scoreB;
    }
}
