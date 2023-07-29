@component('mail::message')

# Train Delay Notification

There is a delay in the train schedule. The delay time is: **{{ $delay_time }}**

## Train Information
@php( $trainInfo = \App\Train::where('id', $train_id)->first())
- **Train Name:** {{ $trainInfo->name }}
- **From:** {{ $trainInfo->from }}
- **To:** {{ $trainInfo->to }}
- **Date:** {{ $trainInfo->date }}
- **From Time:** {{ $trainInfo->from_time }}
- **To Time:** {{ $trainInfo->to_time }}
@php($ticketInfo = \App\Ticket::where('train_id', $train_id)->where('passenger_id', $passenger_id)->get())
## Ticket Information

@foreach($ticketInfo as $ticket)
- **Ticket ID:** {{ $ticket->id }}
- **Ticket Price:** LKR {{ $ticket->ticket_price }}
- **Ticket QTY:** {{ $ticket->qty }}
- **Total Price:** LKR {{ $ticket->total_price }}

---
@endforeach

We apologize for any inconvenience this may cause to your travel plans.<br>
Thank you for your understanding and patience during this time. Your safety and comfort are our top priorities.

Best regards,<br>
The Train Management Team
@endcomponent
