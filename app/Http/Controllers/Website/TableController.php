<?php

namespace App\Http\Controllers\Website;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function __invoke(Request $request)
    {
        $tables = Table::query()->where('status', TableStatus::Available)
            ->whereHas('reservations', function ($query) use($request) {
                $query->whereNot('date', $request->date);
            })->get();

        return $tables;
    }
}
