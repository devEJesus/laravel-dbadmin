<?php

namespace App\Actions\Database;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GetDatabase
{
    public function handle(): Collection
    {
        $tables = DB::select("SHOW TABLES");
        return collect(array_map(function ($table) {
            return $table->{'Tables_in_laravel-phpmyadmin'};
        }, $tables));
    }
}
