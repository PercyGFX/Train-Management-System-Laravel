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

        $id = auth()->id();



        return view('user.userpanel');
    }

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
    $ticketCount = Ticket::where('passenger_id', $passenger->id)->count();
 

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





}
