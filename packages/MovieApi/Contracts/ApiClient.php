<?php

declare(strict_types=1);

namespace Skimmerle\MovieApi\Contracts;

use Skimmerle\MovieApi\Models\Movie;

interface ApiClient
{
    /**
     * @return Movie[]
     */
    public function getData(): array;
}
