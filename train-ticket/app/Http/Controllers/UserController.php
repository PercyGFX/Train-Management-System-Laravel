<?php

namespace App\Http\Controllers;

use App\LiveLocation;
use App\Mail\TestMail;
use App\Ticket;
use App\Train;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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


    //location update API

    public function locationupdate(Request $request){

        // Validate the JSON data
        $validator = Validator::make($request->all(), [
            'train_id' => 'required|integer',
            'status' => 'required|integer',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'delay_time' => 'required|date_format:H:i:s',
            'delay_status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            // If validation fails, return the error response with validation messages
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Get the validated JSON data
        $jsonData = $validator->validated();


        //email send if delayed

        if ($jsonData['delay_status'] == 1) {

            //get all passenger emails to train id
            $trainId = $jsonData['train_id'];
            $ticketPassengerIds = Ticket::where('train_id', $trainId)->pluck('passenger_id');
            $passengerEmails = User::whereIn('id', $ticketPassengerIds)->pluck('email')->toArray();

            //get train & ticket data to train ID
            $trainInfo = Train::where('id', $trainId)->first();
            $ticketInfo = Ticket::where('train_id', $trainId)->first();

            // Step 4: Create the email body with the required information
            $testMailData = [
                'title' => 'Train Delay Notification From E-Train',
                'body' => '<h2>There is a delay in the train schedule. The delay time is: ' . $jsonData['delay_time'] . '</h2>' .
                    '<table border="1" cellpadding="5">' .
                    '<tr><th>Train Name</th><th>From</th><th>To</th><th>Date</th><th>From Time</th><th>To Time</th></tr>' .
                    '<tr><td>' . $trainInfo->name . '</td><td>' . $trainInfo->from . '</td><td>' . $trainInfo->to . '</td><td>' . $trainInfo->date . '</td><td>' . $trainInfo->from_time . '</td><td>' . $trainInfo->to_time . '</td></tr>' .
                    '</table>' .
                    '<p>Ticket Price: ' . $ticketInfo->ticket_price . '</p>' .
                    '<p>Ticket QTY: ' . $ticketInfo->qty . '</p>' .
                    '<p>Total Price: ' . $ticketInfo->totle_price . '</p>',
            ];

            // Step 5: Send the email to the passengers
            Mail::to($passengerEmails)->send(new TestMail($testMailData));
        }

        // Extract the train_id from the JSON data
        $trainId = $jsonData['train_id'];

        // Check if a record with the given train_id exists in the LiveLocation model
        $liveLocation = LiveLocation::where('train_id', $trainId)->first();

        if ($liveLocation) {
            // If a record exists, update it with the new data
            $liveLocation->update($jsonData);
        } else {
            // If no record exists, create a new one
            $train = Train::find($trainId); // Assuming you have a Train model with train details
            if (!$train) {
                // Handle the case where the associated train does not exist
                return response()->json(['message' => 'Train not found'], 404);
            }

            LiveLocation::create($jsonData);
        }

        // Return a success response
        return response()->json(['message' => 'Data inserted/updated successfully']);

    }


    // email contact

    public function contactemail(){

        return view('user.contactemail');
    }

    public function contactemailsend(Request $request){

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ];
    
        // Create the validator instance
        $validator = Validator::make($request->all(), $rules);
    
        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        

        $testMailData = [
            'title' => 'E-Train Contact Us',
            'body' => '<p style="font-weight: bold; color: #333;">Name: <span style="color: #ff6600;">' . $request->name . '</span><br>
                       Email: <span style="color: #ff6600;">' . $request->email . '</span><br>
                       Subject: <span style="color: #ff6600;">' . $request->subject . '</span><br>
                       Message: <span style="color: #ff6600;">' . $request->message . '</span></p>',
        ];
        

        //send mail to company email
        Mail::to('isurangabtk@gmail.com')->send(new TestMail($testMailData));

        return view('user.contactemail')->with('message', "Message sent successfully");
    


    }

//notify callback
    public function notify(Request $request){

        $payment_status = $request->status_code;
        $ticket_id = $request->order_id;


         // Find the Ticket record using the $ticket_id
    $ticket = Ticket::find($ticket_id);

    // Update the status based on the $payment_status
    switch ($payment_status) {
        case '2':
            $ticket->status = 'Completed';
            break;
        case '0':
            $ticket->status = 'Pending';
            break;
        case '-1':
            $ticket->status = 'Canceled';
            break;
        case '-2':
            $ticket->status = 'Failed';
            break;
        case '-3':
            $ticket->status = 'Charged Back';
            break;
        default:
            // Handle other cases, if needed
            break;
    }

    // Save the updated ticket status
    $ticket->save();

    // Return a response to PayHere (important for the payment process to be completed)
    return response()->json(['status' => 'success']);

  
    }
    


}

