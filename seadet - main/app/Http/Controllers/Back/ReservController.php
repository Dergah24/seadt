<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Reserv;
use Illuminate\Http\Request;

class ReservController extends Controller
{

    public function index()
    {

        $response = Reserv::OrderBy('created_at', 'desc')->get();

        return view('Back.reservation.index', compact('response'));

    }

    public function addReserv(Request $request)
    {

        $isResrcd = Reserv::whereReserved($request->reserved)->first();

        if (!isset($isResrcd)) {

            $response = new Reserv;
            $response->fullname = $request->fullname;
            $response->event = $request->event;
            $response->phone = $request->phone;
            $response->reserved = $request->reserved;
            $response->content = $request->content;
            $is_saved = $response->save();

            if ($is_saved) {
                return response()->json(['success' => 'Reserv edildi']);
            } else {
                return response()->json(['error' => 'Xeta basverdi']);
            }

        } else {
            return response()->json(['error' => 'Bu gun artiq reserv edilib']);
        }

    }
}
