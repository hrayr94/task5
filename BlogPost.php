<?php

class BlogPost
{
    public function __construct(
        private int    $id,
        private string $title,
        private string $content,
        private string $createdAt
    )
    {
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }
}
