<?php

declare(strict_types=1);

namespace Skimmerle\MovieApi\Models;

class Movie
{
    private string $id;
    private string $title;
    private int $publicationYear;

    public function __construct(string $id, string $title, int $publicationYear)
    {

        $this->id              = $id;
        $this->title           = $title;
        $this->publicationYear = $publicationYear;
    }

    public static function createByArray(array $data): ?Movie
    {
        $id         = data_get($data, 'imdbID');
        $title           = data_get($data, 'Title');
        $publicationYear = data_get($data, 'Year');

        if (empty($id) || empty($title) || empty($publicationYear)) {
            return null;
        }

        return new static($id, $title, $publicationYear);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPublicationYear(): int
    {
        return $this->publicationYear;
    }
}
