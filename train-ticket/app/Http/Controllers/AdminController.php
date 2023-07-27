<?php

namespace App\Http\Controllers;

use App\LoyaltyDiscount;
use App\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Ticket;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function view_train(){

        $trains = Train::get();
        return view('admin.trains',['trains'=>$trains]);
    }
    public function train_deactive($id){

        $train = Train::find($id);
        $train->is_active = 0;
        $train->save();

        return redirect()->back();
    }
    public function save_train(Request $request)
    {
//        return $request;
//        id,   name, image, from, to, from_time, to_time, ticket_price, is_active, seats
        $train = new Train();
        $train->name = $request->input('trainname');
//        if ($image = $request->file('picture')) {
        $image = $request->file('picture');
        $path = Storage::putFile('/train', $image, 'public');
        $train->image = $path;
//        }
        $train->from = $request->input('fromlocation');
        $train->to = $request->input('tolocation');
        $train->from_time = $request->input('from-time');
        $train->date = $request->input('from-date');
        $train->to_time = $request->input('to-time');
        $train->is_active = 1;
        $train->ticket_price = $request->input('price');
        $train->seats = $request->input('seates');
        $train->save();

        return redirect()->back()->with('success', 'Train Added Successfully');
    }


    // show tickets

    public function showtickets(){
        $tickets = Ticket::with('passenger.user', 'train')->get();
        return view('admin.tickets', ['tickets' => $tickets]);
    }
    public function users(){
        $users = User::with(['passengers' => function ($query) {
            $query->withCount('tickets');
        }])->where('type', 'Passenger')->get();

        return view('admin.users', ['users' => $users]);
    }

    public function addtrain() {
        return view('admin.addtrain');
    }
    // edit discount
    public function dashboard() {
        return view('admin.dashboard');
    }
    public function loyalitydiscountedit(){

        return view('admin.discountedit');
    }
    public function loyaltydiscount(){
        $loyaltyDiscounts = LoyaltyDiscount::all();
        return view('admin.loyalitydiscount', ['loyaltyDiscounts' => $loyaltyDiscounts]);
    }
}
