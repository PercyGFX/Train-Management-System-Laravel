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
       <div class="m-3 card flex" style="max-width: 500px;">
        <div class="row g-0">
            <div class="col-sm-5">
                <img src="frontend/images/popular_2.jpg"  class="card-img-top h-100" alt="...">
            </div>
            <div class="col-sm-7">
                <div class="card-body">
                    <h3  class="card-title poppins text-danger">Ruhunu Kumari</h3>
                    <h4 class="poppins"><span class="font-weight-bold">From: </span> Colombo</h4>
                    <h4 class="poppins"><span class="font-weight-bold">To:</span> Galle</h4>
                    <h4 class="poppins"><span class="font-weight-bold">Date:</span> 2023/07/30</h4>
                    <h4 class="poppins"><span class="font-weight-bold">Departure Time:</span> 7.30 AM</h4>
                    <h4 class="poppins"><span class="font-weight-bold">Arrival Time:</span> 11.00 AM</h4>
                    <h4 class="poppins text-success"><span class="font-weight-bold">Ticket Price:</span> RS 200</h4>
                    
                    <a href="#" class="btn btn-primary stretched-link">Book Seats</a>
                </div>
            </div>
        </div>
    </div>

  <!-- Item -->


  <!-- Item -->
  <div class="m-3 card flex" style="max-width: 500px;">
    <div class="row g-0">
        <div class="col-sm-5">
            <img src="frontend/images/popular_2.jpg"  class="card-img-top h-100" alt="...">
        </div>
        <div class="col-sm-7">
            <div class="card-body">
                <h3  class="card-title poppins text-danger">Ruhunu Kumari</h3>
                <h4 class="poppins"><span class="font-weight-bold">From: </span> Colombo</h4>
                <h4 class="poppins"><span class="font-weight-bold">To:</span> Galle</h4>
                <h4 class="poppins"><span class="font-weight-bold">Date:</span> 2023/07/30</h4>
                <h4 class="poppins"><span class="font-weight-bold">Departure Time:</span> 7.30 AM</h4>
                <h4 class="poppins"><span class="font-weight-bold">Arrival Time:</span> 11.00 AM</h4>
                <h4 class="poppins text-success"><span class="font-weight-bold">Ticket Price:</span> RS 200</h4>
                
                <a href="#" class="btn btn-primary stretched-link">Book Seats</a>
            </div>
        </div>
    </div>
</div>

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
