<?php

namespace App\Http\Controllers\Pages\Reservations;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function rooms()
    {
        $rooms = Room::all();

        return response()->json([
            'data' => $rooms
        ]);
    }

    public function room($id)
    {
        $room = Room::find($id);

        return response()->json([
            'data' => $room
        ]);
    }
}
