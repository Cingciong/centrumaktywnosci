<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Carbon;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = now();
        $end = now()->addDay();

        while ($start->lte($end)) {
            $rooms = Room::all();

            foreach ($rooms as $room) {
                $reservationsCount = rand(1, 2);

                for ($i = 0; $i < $reservationsCount; $i++) {
                    do {
                        $startTime = $this->generateRandomTime();
                        $endTime = (clone $startTime)->addHours(rand(1, 4))->addMinutes(rand(0,1)*30); // random duration between 1 and 4 hours

                        $isReserved = Reservation::where('room_id', $room->id)
                            ->where(function ($query) use ($startTime, $endTime) {
                                $query->where(function ($query) use ($startTime, $endTime) {
                                    $query->where('start_time', '<', $startTime)
                                        ->where('end_time', '>', $startTime);
                                })->orWhere(function ($query) use ($startTime, $endTime) {
                                    $query->where('start_time', '<', $endTime)
                                        ->where('end_time', '>', $endTime);
                                })->orWhere(function ($query) use ($startTime, $endTime) {
                                    $query->where('start_time', '>', $startTime)
                                        ->where('end_time', '<', $endTime);
                                })->orWhere(function ($query) use ($startTime, $endTime) {
                                    $query->where('start_time', '=', $startTime)
                                        ->where('end_time', '=', $endTime);
                                })->orWhere(function ($query) use ($startTime, $endTime) {
                                    $query->where('start_time', '=', $startTime)
                                        ->where('end_time', '>', $endTime);
                                })->orWhere(function ($query) use ($startTime, $endTime) {
                                    $query->where('start_time', '<', $startTime)
                                        ->where('end_time', '=', $endTime);
                                });
                            })->exists();
                        // Check if the reservation time is between 7 AM and 10 PM
                        $isBetween7and22 = $startTime->hour >= 7 && $startTime->hour < 22 && $endTime->hour >= 7 && $endTime->hour < 22;

                        // Check if the start time is smaller than the end time
                        $isStartSmallerThanEnd = $startTime->lessThan($endTime);
                    } while ($isReserved || !$isBetween7and22 || !$isStartSmallerThanEnd);

                    Reservation::create([
                        'room_id' => $room->id,
                        'start_time' => $startTime,
                        'end_time' => $endTime,
                    ]);
                }
            }

            $start->addDay();
        }
    }

    private function generateRandomTime()
    {
        $hour = rand(7, 19);
        $minute = rand(0, 1) * 30;

        return now()->startOfDay()->addHours($hour)->addMinutes($minute);
    }
}
