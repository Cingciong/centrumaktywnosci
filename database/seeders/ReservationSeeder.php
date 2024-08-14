<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Carbon;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
        $end = now()->addMonth();
        $rooms = Room::all();

        $totalDays = $start->diffInDays($end)+1;
        $totalOperations = $rooms->count() * $totalDays;

        $startOperationTime = microtime(true);
        $completedOperations = 0;

        while ($start->lte($end)) {
            foreach ($rooms as $room) {
                $start->setTime(0, 0, 0);
                $numberOfReservations = rand(1, 3);

                for ($i = 0; $i < $numberOfReservations; $i++) {

                    $this->generateReservation($room, $start);
                }

                $completedOperations++;
                $progressPercentage = ($completedOperations / $totalOperations) * 100;

                $endOperationTime = microtime(true);
                $operationDuration = ($endOperationTime - $startOperationTime) * 1000;

                echo "Progress: " . round($progressPercentage, 2) . "% at " . round($operationDuration, 2) . " milliseconds.\n";

            }
            $start->addDay();
        }
    }

    private function generateReservation($room, $start)
    {
        $i=0;
        do {
            $startTime = $start->copy()->addHours(rand(7, 17))->addMinutes(rand(0, 2) * 30);
            $endTime = $startTime->copy()->addHours(rand(1, 3))->addMinutes(rand(0, 2) * 30);
            $i++;
            $doesReservationExist = Reservation::where('room_id', $room->id)
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->whereBetween('start_time', [$startTime, $endTime])
                        ->orWhereBetween('end_time', [$startTime, $endTime]);
                })->exists();

        } while ($doesReservationExist);

        echo "Room: " . $room->id . " Start: " . $startTime . " End: " . $endTime . " Iterations: " . $i . "\n";

        Reservation::create([
            'room_id' => $room->id,
            'start_time' => $startTime,
            'end_time' => $endTime,
        ]);
    }
}
