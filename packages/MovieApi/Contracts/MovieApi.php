<?php

declare(strict_types=1);

namespace Skimmerle\MovieApi\Contracts;

use Skimmerle\MovieApi\Models\Movie;

interface MovieApi
{
    /**
     * @param string $title
     * @return Movie[]
     */
    public function searchByTitle(string $title): array;
}
