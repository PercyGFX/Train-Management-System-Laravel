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

    //location update

    public function locationupdate(Request $request){

      // Get the JSON data from the request
    $jsonData = $request->input();

    // Extract the train_id from the JSON data
    $trainId = $jsonData['train_id'];

    // Check if a record with the given train_id exists in the LiveLocation model
    $liveLocation = LiveLocation::where('train_id', $trainId)->first();

    if ($liveLocation) {
        // If a record exists, update it with the new data
        $liveLocation->update([
            'status' => $jsonData['status'],
            'lat' => $jsonData['lat'],
            'lng' => $jsonData['lng'],
            'delay_time' => $jsonData['delay_time'],
            'delay_status' => $jsonData['delay_status'],
        ]);
    } else {
        // If no record exists, create a new one
        $train = Train::find($trainId); // Assuming you have a Train model with train details
        if (!$train) {
            // Handle the case where the associated train does not exist
            return response()->json(['message' => 'Train not found'], 404);
        }

        LiveLocation::create([
            'train_id' => $trainId,
            'status' => $jsonData['status'],
            'lat' => $jsonData['lat'],
            'lng' => $jsonData['lng'],
            'delay_time' => $jsonData['delay_time'],
            'delay_status' => $jsonData['delay_status'],
        ]);
    }

    // Return a success response
    return response()->json(['message' => 'Data inserted/updated successfully']);


    
    }



}
