<?php

declare(strict_types=1);

namespace Skimmerle\MovieApi\Models;

class Movie
{
    public string $id;
    public string $title;
    public int $year;

    public function __construct(string $id, string $title, int $year)
    {

        $this->id              = $id;
        $this->title           = $title;
        $this->year = $year;
    }

    public static function createByArray(array $data): ?Movie
    {
        $id         = data_get($data, 'imdbID');
        $title           = data_get($data, 'Title');
        $year = (int)data_get($data, 'Year');

        if (empty($id) || empty($title) || empty($year)) {
            return null;
        }

        return new static($id, $title, $year);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getYear(): int
    {
        return $this->year;
    }
}
