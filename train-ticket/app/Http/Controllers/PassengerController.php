<?php

namespace App\Http\Controllers;
use App\Train;

use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function searchtrain(Request $request) {

        $fromLocation = $request->input('fromlocation');
        $toLocation = $request->input('tolocation');
        $date = $request->input('date');

        $trains = Train::where('from', $fromLocation)
            ->where('to', $toLocation)
            ->where('date', $date)
            ->where('is_active', 1)
            ->take(3)
            ->get();

        // If no results found, use a default message
        if ($trains->isEmpty()) {
            $notFoundMessage = "No available trains found for the specified criteria.";
            return view('user.home', compact('notFoundMessage'));
        }

        // If results found, pass them to the view
        return view('user.home', compact('trains'));
    }
}
