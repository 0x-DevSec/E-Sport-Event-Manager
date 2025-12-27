<?php

abstract class AbstractEntity
{
    protected ?int $id = null;


    protected function getId(): ?int
    {
        return $this->id;
    }

    protected function setId(int $id): void
    {
        $this->id = $id;
    }
}