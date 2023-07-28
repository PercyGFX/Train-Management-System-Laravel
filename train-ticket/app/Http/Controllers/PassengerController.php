<?php

namespace App\Http\Controllers;
use App\Train;
use App\LiveLocation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use App\Ticket;
use App\User;

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

        return view('user.paymentsummery');
    }





}
