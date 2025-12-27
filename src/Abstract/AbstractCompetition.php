<?php

require_once 'AbstractEntity.php';

abstract class AbstractCompetition extends AbstractEntity {
    protected string $status;
    protected DateTime $date;

    public function __construct(DateTime $date)
    {
        $this->date = $date;
        $this->status = 'planned';
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function close(): void
    {
        $this->status = 'finished';
    }

    abstract public function getResult(): string;
}
