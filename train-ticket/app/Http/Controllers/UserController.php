<?php

namespace App\Http\Controllers;

use App\LiveLocation;
use App\LoyaltyDiscount;
use App\Mail\Delaymaill;
use App\Mail\TestMail;
use App\Mail\Thankyou;
use App\Passenger;
use App\Ticket;
use App\Train;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

    public function alltrains() {

        $currentDate = Carbon::now()->toDateString();

// Load trains that are active and depart after today
        $trains = Train::where('is_active', 1)
            ->where('date', '>=', $currentDate)
            ->get();

        return view('user.trains', ['trains' => $trains]);
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
            $delaytime = $jsonData['delay_time'];
            $ticketPassengerIds = Ticket::where('train_id', $trainId)->pluck('passenger_id');
            $passengers = Passenger::with('user')->whereIn('id', $ticketPassengerIds)->get();


            foreach ($passengers as $passenger){
                Mail::to($passenger->user->email)->send(new Delaymaill($trainId,$passenger->id,$delaytime));
            }

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

        Mail::to($request->email)->send(new Thankyou($request->name));

        return view('user.contactemail')->with('message', "Message sent successfully");



    }

//notify callback
    public function notify(Request $request){

        $payment_status = $request->status_code;
        $ticket_id = $request->order_id;

//        Log::notice($request);
//        [2023-07-29 09:12:57] local.NOTICE: array (
//            'merchant_id' => '1223617',
//            'order_id' => '79',
//            'payment_id' => '320032347767',
//            'captured_amount' => '490.00',
//            'payhere_amount' => '490.00',
//            'payhere_currency' => 'LKR',
//            'status_code' => '2',
//            'md5sig' => 'F555355062D82F1B0D9EFF42A7B727A2',
//            'custom_1' => NULL,
//            'custom_2' => NULL,
//            'status_message' => 'Successfully received the MASTER payment',
//            'method' => 'MASTER',
//            'card_holder_name' => 'dsf',
//            'card_no' => '************1191',
//            'card_expiry' => '12/24',
//            'recurring' => '0',
//        )
//        id, created_at, updated_at, deleted_at, order_id, payment_id, payhere_amount, payhere_currency, status_message, card_expiry, card_no, method, card_holder_name, ticket_id
         // Find the Ticket record using the $ticket_id
    $ticket = Ticket::with('passenger.user','train')->find($ticket_id);

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

        Mail::to($ticket->passenger->user->email)->send(new \App\Mail\Ticket($ticket->id));

    // Return a response to PayHere (important for the payment process to be completed)
    return response()->json(['status' => 'success']);


    }
    public function loyalty(){
        $bronze = LoyaltyDiscount::where('badge','Bronze')->first();
        $gold = LoyaltyDiscount::where('badge','Gold')->first();
        $platinum = LoyaltyDiscount::where('badge','Platinum')->first();
        return view('user.loyalty',['bronze'=>$bronze,'gold'=>$gold,'platinum'=>$platinum]);
    }


}

