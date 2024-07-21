<?php

namespace App\Dto;

use Illuminate\Support\Collection;

class TableData
{
    public Collection $header;
    public Collection $body;

    public function __construct(Collection $header, Collection $body)
    {
        $this->header = $header;
        $this->body = $body;
    }
}
