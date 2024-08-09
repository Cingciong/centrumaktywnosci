<?php

namespace App\Http\Controllers\Pages\Reservations;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

class ReservationController extends Controller
{
    public function getReservations(Request $request)
    {
        $startDate = Carbon::parse($request->start_date);
        $endDate = $request->end_date ? Carbon::parse($request->end_date) : $startDate->copy()->addHours(24);


        if ($startDate->equalTo($endDate)) {
            $endDate->addHours(24);
        }



        $reservations = Reservation::whereBetween('start_time', [$startDate, $endDate->endOfDay()])->get();



        $reservations = $reservations->map(function ($reservation) {
            $startTime = Carbon::parse($reservation->start_time);
            $endTime = Carbon::parse($reservation->end_time);
            $duration = $startTime->diffInMinutes($endTime);
            $amountTiles = ceil($duration/30);
            $tiles = [];
            for ($i = 0; $i < $amountTiles; $i++) {
                $tiles[] = $startTime->copy()->addMinutes($i * 30)->format('H:i');
            }

            return [
                'start_time' => $reservation->start_time,
                'end_time' => $reservation->end_time,
                'room_id' => $reservation->room_id,
                'tiles' => $tiles,
                'duration' => $duration,
            ];
        });



        return response()->json($reservations);
    }
}
