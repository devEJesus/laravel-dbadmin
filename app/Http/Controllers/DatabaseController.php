<?php

namespace App\Http\Controllers;

use App\Actions\Database\GetDatabase;
use App\Dto\TableData;
use App\Services\TableService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DatabaseController extends Controller
{
    protected TableService $tableService;

    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function index(Request $data, GetDatabase $request)
    {
        $tables = $request->handle();

        $items = $tables->map(function ($item) {
            return [
                "value" => $item,
                "name" => $item,
            ];
        });

        // If table send
        if ($data->input('table')) {
            $this->tableService->setTable($data->input('table'));
            $table = $this->tableService->getTableData();
        } else {
            $table = new TableData(collect(), collect());
        }

        return Inertia::render("Database/Index", ['tables' => $items, 'table' => $table]);
    }
}
