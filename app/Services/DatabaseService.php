<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Database\DatabaseManager;

class DatabaseService
{
    protected string $table;
    protected DatabaseManager $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * Set table name
     *
     * @param string $table
     */
    public function setTable(string $table): void
    {
        $this->table = $table;
    }

    /**
     * Get columns from table
     *
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    protected function getColumns(): Collection
    {
        try {
            return collect($this->db->select("SHOW COLUMNS FROM {$this->table}"));
        } catch (\Exception $e) {
            throw new \Exception("Failed to get columns for table {$this->table}: " . $e->getMessage());
        }
    }
}
