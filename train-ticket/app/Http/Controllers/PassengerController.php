<?php

namespace App\Http\Controllers;
use App\Train;
use App\LiveLocation;

use Illuminate\Http\Request;

class PassengerController extends Controller
{

    //home page search
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

    //live location

    public function liveLocation($id)
    {
        {
            if ($id) {
                // Find the LiveLocation data by the given train_id and where status is 1
                $locationData = LiveLocation::where('train_id', $id)
                                            ->where('status', 1)
                                            ->first();
    
                // Find the Train data by the given train_id using the relationship
                $trainData = $locationData ? $locationData->train : null;
    
                // Pass the data and error message to the view
                return view('user.livelocation', compact('locationData', 'trainData'));
            } else {
                // Handle the case when no train_id is provided
                $errorMessage = 'Please provide a valid train ID.';
                return view('user.livelocation', compact('errorMessage'));
            }
        }
    }



}
