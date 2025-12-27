<?php

interface ArchivableInterface
{
    /**
     * Archive the entity
     */
    public function archive(): void;

    /**
     * Check if archived
     */
    public function isArchived(): bool;
}
