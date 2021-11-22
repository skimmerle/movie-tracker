<?php

declare(strict_types=1);

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Jsonable;

class SearchResponse implements Jsonable
{
    public array $data = [
        'success' => true,
    ];

    public function toJson($options = 0)
    {
        return json_encode($this->data);
    }
}
