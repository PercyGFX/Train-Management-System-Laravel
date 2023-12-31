<?php

namespace App\Http\Controllers;
use App\Train;
use App\LiveLocation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Ticket;
use App\LoyaltyDiscount;
use App\Passenger;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

use Illuminate\Http\Request;

class PassengerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('passenger');
    }

    // user panel

    public function userpanel(){

        $user = auth()->user();

        // Get the passenger associated with the authenticated user using the user_id foreign key
        $passenger = Passenger::where('user_id', $user->id)->first();


        $tickets = Ticket::where('passenger_id', $passenger->id)
        ->with('train')
        ->orderBy('id', 'desc')
        ->get();

        // Pass the tickets data to the view
         return view('user.userpanel', compact('tickets'));


    }


    //payment summery
    public function paymentsummery(Request $request){


        $train_id = $request->trainId;
    $qty = $request->quantity;

    // Get the authenticated user
    $user = auth()->user();

    // Get the passenger associated with the authenticated user using the user_id foreign key
    $passenger = Passenger::where('user_id', $user->id)->first();

    // If there is no passenger associated with the user, create one (optional step)
    if (!$passenger) {
        $passenger = new Passenger();
        $passenger->user_id = $user->id;
        $passenger->save();
    }

    // Count the number of tickets for the passenger in the Tickets table

   // $ticketCount = Ticket::where('passenger_id', $passenger->id)->count();

    // Calculate the total quantity of tickets for the passenger from the Ticket model
    $ticketCount = Ticket::where('passenger_id', $passenger->id)->sum('qty');



    // Get the closest lower value row from the LoyaltyDiscount model
    $loyaltyDiscount = LoyaltyDiscount::where('ticket_count', '<=', $ticketCount)
        ->orderBy('ticket_count', 'desc')
        ->first();


    // If there is no closest lower value, get the lowest ticket_count value
    if (!$loyaltyDiscount) {
        $loyaltyDiscount = LoyaltyDiscount::orderBy('ticket_count', 'asc')->first();
        $badge = 'New User';
        $discountPercentage = 0;
    } else {
        $badge = $loyaltyDiscount->badge;
        $discountPercentage = $loyaltyDiscount->dicount_precentage;
    }

    // Get the Train model data
    $train = Train::find($train_id);

    // Calculate the total price (subtotal) before applying the discount
    $subtotal = $train->ticket_price * $qty;

    // Calculate the discount amount as a percentage of the subtotal
    $discount = ($subtotal * $discountPercentage) / 100;

    // Calculate the total price after applying the discount
    $total = $subtotal - $discount;

    // Pass the required data to the view
    return view('user.paymentsummery', compact('train_id', 'qty', 'passenger', 'train', 'loyaltyDiscount', 'total', 'badge', 'discount', 'subtotal', 'discountPercentage'));


    }



    //payment logic
    public function initiatePayment(Request $request){

        // get values

        $passenger_id = $request->passenger_id;
        $train_id = $request->train_id;
        $qty = $request->qty;
        $discount = $request->discount;
        $ticket_price = $request->ticket_price;
        $total_price = $request->total_price;
        $train_name = $request->train_name;




        // Save the ticket data to the database
        $ticket = Ticket::create([
            'passenger_id' => $passenger_id,
            'train_id' => $train_id,
            'qty' => $qty,
            'discount' => $discount,
            'ticket_price' => $ticket_price,
            'totle_price' => $total_price,
            'status' => 'Pending', // Hard-coded status as "Pending"
        ]);

       $user = Passenger::with('user')->find($passenger_id);
       $train = $ticket->train;




//
//       $testMailData = [
//        'title' => 'E-Train - Your Ticket Details',
//        'body' => '<p style="font-weight: bold; color: #333;">Name: <span style="color: #ff6600;">' . $user->user->fname . ' '. $user->user->lname . '</span><br>
//                   Ticket Id: <span style="color: #ff6600;">' . $ticket->id . '</span><br>
//                   Ticket Price: <span style="color: #ff6600;">' . $ticket->ticket_price . '</span><br>
//                   Discount: <span style="color: #ff6600;">' . $ticket->discount . '</span><br>' .
//                   'Total Price: <span style="color: #ff6600;">' . $ticket->totle_price . '</span><br>' .
//                   'Payment Status: <span style="color: #ff6600;">' . $ticket->status . '</span><br>' .
//                   'Train Name: <span style="color: #ff6600;">' . $train->name . '</span><br>' .
//                   'From Location: <span style="color: #ff6600;">' . $train->from . '</span><br>' .
//                   'To Location: <span style="color: #ff6600;">' . $train->to . '</span><br>' .
//                   'Date: <span style="color: #ff6600;">' . $train->date . '</span><br>' .
//                   'Start Time: <span style="color: #ff6600;">' . $train->from_time . '</span></p><br>'
//                   ,
//
//    ];
//
//
//    //send mail to company email
////  Mail::to($user->user->email)->send(new TestMail($testMailData));
//   Mail::to($user->user->email)->send(new \App\Mail\Ticket($ticket->id));
//   //Mail::to('isurangabtk@gmail.com')->send(new TestMail($testMailData));
//
//
//


          // Prepare the payment data
    $paymentData = [
        'merchant_id' => '1223617',
        'return_url' => route('ticket'), // The URL to redirect after payment (callback URL)
        'cancel_url' => route('userpanel'), // The URL to redirect if the user cancels the payment
        'notify_url' => route('notify'),
        'first_name' => 'nimal',
        'last_name' => 'kamal',
        'email' => 'test@gmail.com',
        'phone' => '0775001170',
        'address' => 'address',
        'city' => 'address',
        'country' => 'Sri Lanka',
        'order_id' => $ticket->id,
        'items' => $train_name,
        'currency' => 'LKR', // Currency code (LKR for Sri Lankan Rupees)
        'amount' => $total_price,
        // Add other relevant data as needed
    ];

//    localhost
//    $merchant_secret = "MzM5NjI0OTc0NzQyMDg3MjIwMzExMzY0Nzg0MTEzOTA3NDA5MDE0";

        $merchant_secret = "NDI1MjczMjgzMzg0MTYxMzUyMTIxMjkyOTUwNzE5ODM1ODc5NjQ=";


// Step 2: Calculate the MD5 hash of the concatenated data
$hash = strtoupper(
    md5(
        $paymentData['merchant_id'] .
        $paymentData['order_id'] .
        number_format($paymentData['amount'], 2, '.', '') .
        $paymentData['currency'] .
        strtoupper(md5($merchant_secret))
    )
);


// Add the calculated hash to the $paymentData array
$paymentData['hash'] = $hash;

    return view('user.payment_redirect', compact('paymentData'));


    }

    //ticket


    public function ticket(Request $request){

        $ticketId = $request->input('order_id');

        // Find the ticket by its ID with the related passenger and train information using eager loading


        // Find the ticket by its ID with the related passenger and train information using eager loading
        $ticket = Ticket::with('passenger', 'train')->find($ticketId);

        // Retrieve the User model details based on the passenger's user_id
        $user = $ticket->passenger->user;

        // Pass the ticket, passenger, train, and user data to the view
        return view('user.ticket', compact('ticket', 'user'));


    }




}


