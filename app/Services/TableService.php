<?php

namespace App\Services;

use App\Dto\TableData;
use Illuminate\Support\Collection;

class TableService extends DatabaseService
{
    /**
     * Get table data
     *
     * @return TableData
     * @throws \Exception
     */
    public function getTableData(): TableData
    {
        // Get table header
        $header = $this->getColumns()->pluck('Field');

        // Get table values
        $table = $this->getTable();

        $body = $table->map(function ($row) {
            return array_values((array) $row);
        });

        // Return the table data as a TableData object
        return new TableData($header, $body);
    }

    /**
     * Get all rows from the current table
     *
     * @return \Illuminate\Support\Collection
     * @throws \Exception
     */
    private function getTable(): Collection
    {
        try {
            return $this->db->table($this->table)->get();
        } catch (\Exception $e) {
            throw new \Exception("Failed to get data from table {$this->table}: " . $e->getMessage());
        }
    }
}
