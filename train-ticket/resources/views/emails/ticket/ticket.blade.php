@component('mail::message')

@php($ticket = \App\Ticket::with('passenger.user','train')->find($user))
# Ticket Booking Confirmation

Dear **{{$ticket->passenger->user->fname}} {{$ticket->passenger->user->lname}}**,

Thank you for booking your train ticket with us. We are excited to have you on board for your journey!

Here are the details of your ticket:

- **Ticket ID:** {{$ticket->id}}
- **Ticket Price:** LKR {{$ticket->ticket_price}}
- **Discount:** LKR {{$ticket->discount}}
- **Ticket Count:** LKR {{$ticket->qty}}
- **Total Price:** LKR {{$ticket->totle_price}}
- **Payment Status:** {{$ticket->status}}

**Train Details:**
- **Train Name:** {{$ticket->train->name}}
- **From Location:** {{$ticket->train->from}}
- **To Location:** {{$ticket->train->to}}
- **Date:** {{$ticket->train->date}}
- **Start Time:** {{$ticket->train->from_time}}

You can check the train location using the live tracking URL below:

[**Live Tracking URL**](https://etrain.sanshine.lk/livelocation/{{$ticket->train->id}})

If you have any questions or need assistance, feel free to contact our customer support team.

We look forward to serving you on your journey.

Best regards,
The Ticket Booking Team
@endcomponent
