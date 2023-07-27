@extends('user.layout')
@section('title', 'Trains')
@section('style')
    <style>

.maincontent {
  margin-top: 100px;
}


@media (min-width: 768px) {
  .maincontent {
    margin-top: 200px;
  }
}


@media (min-width: 1200px) {
  .maincontent {
    margin-top: 200px;
  }
}

.poppins {
            font-family: 'Poppins', sans-serif;
        }



    </style>
@endsection
@section('content')



<div class="maincontent">
    <div class="container bg-light rounded mb-5 p-5">
       <h2 class="poppins">All Available Trains</h2>

       <div class="row">
       <!-- Item -->
       @if(count($trains) > 0)

       @foreach ($trains as $train)



       <div class="m-3 card flex" style="max-width: 500px;">
        <div class="row g-0">
            <div class="col-sm-5">
                <img src="{{ asset('storage/' . $train->image) }}" class="card-img-top h-100" alt="...">
            </div>
            <div class="col-sm-7">
                <div class="card-body">
                    <h3  class="card-title poppins text-danger">{{ $train->name }}</h3>
                    <h4 class="poppins"><span class="font-weight-bold">From: </span> {{ $train->from }}</h4>
                    <h4 class="poppins"><span class="font-weight-bold">To:</span> {{ $train->to }}</h4>
                    <h4 class="poppins"><span class="font-weight-bold">Date:</span> {{ $train->date }}</h4>
                    <h4 class="poppins"><span class="font-weight-bold">Departure Time:</span> {{ $train->from_time }}</h4>
                    <h4 class="poppins"><span class="font-weight-bold">Arrival Time:</span> {{ $train->to_time }}</h4>
                    <h4 class="poppins text-success"><span class="font-weight-bold">Ticket Price:</span> RS {{ $train->ticket_price }}</h4>
                    
                    <a href="#" class="btn btn-primary stretched-link">Book Seats</a>   <a href="/livelocation/{{ $train->id }}" class="btn btn-success stretched-link">Live Location</a>
                </div>
            </div>
        </div>
    </div>



       @endforeach


       @else
       <p>No trains found.</p>
        @endif
       

  <!-- Item -->




<!-- Item -->
</div>
    </div>


    

    
</div>


    <!-- Milestones -->

@endsection

@section('script')
    <script>

    </script>
@endsection
