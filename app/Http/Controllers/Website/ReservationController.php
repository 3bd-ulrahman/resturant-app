<?php

namespace App\Http\Controllers\Website;

use App\Enums\TableStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ReservationRequest;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function index()
    {
        $reservation = Session::get('reservation');

        $tables = Table::query()->where('status', TableStatus::Available)
            ->whereHas('reservations', function ($query) {
                $query->whereNotBetween('date', [now()->format('Y-m-d'), now()->addWeek()->format('Y-m-d')]);
            })->get();

        return view('website.reservations.create', compact('reservation', 'tables'));
    }

    public function store(ReservationRequest $reservationRequest)
    {
        $reservation = Session::get('reservation');

        Reservation::query()->updateOrCreate(
            ['id' => $reservation->id], $reservationRequest->validated()
        );

        Session::put('reservation', $reservation);

        return view('thankyou');
    }
}
