<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::query()->paginate(PAGINATION);

        return view('dashboard.reservations.index', compact('reservations'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route('dashboard.reservations.index')
            ->with('success', 'Reservation deleted successfully');
    }
}
