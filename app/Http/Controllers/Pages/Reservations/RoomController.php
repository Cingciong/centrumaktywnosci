<?php

namespace App\Http\Controllers\Pages\Reservations;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return response()->json([
            'data' => $rooms
        ]);
    }
}
