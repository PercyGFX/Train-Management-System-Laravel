@extends('user.layout')
@section('title', 'Trains')
@section('style')
    <style>

        .poppins {
            font-family: 'Poppins', sans-serif;
        }



    </style>
@endsection
@section('content')
<!-- Home -->

<div class="home">
    <!-- Image by  -->
    <div class="home_background parallax-window" data-parallax="scroll" data-image-src="frontend/images/about_background.jpg" data-speed="0.8"></div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_content">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Find Form -->

<div class="find">
    <!-- Image by https://unsplash.com/@garciasaldana_ -->
    <div class="find_background_container prlx_parent">
        <div class="find_background prlx" style="background-image:url(frontend/images/find.jpg)"></div>
    </div>
    <!-- <div class="find_background parallax-window" data-parallax="scroll" data-image-src="images/find.jpg" data-speed="0.8"></div> -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="find_title text-center">Find the train to your destination</div>
            </div>
            <div class="col-12">
                <div class="find_form_container">
                    <form action="{{ route('home/search') }}" method="POST" id="find_form" class="find_form d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-between justify-content-start flex-wrap">
                        @csrf
                        <div class="find_item">
                            <div>From Location:</div>
                           <select name="fromlocation" id="adventure" class="dropdown_item_select find_input">
                                                          @php($trainfrom = \App\Train::select('from')->groupBy('from')->get())
                               @foreach($trainfrom as $tfrom)
                                   <option>{{ $tfrom->from }}</option>

                               @endforeach

                                                       </select>
                        </div>
                        <div class="find_item">
                            <div>To Location:</div>
                            <select name="tolocation" id="adventure" class="dropdown_item_select find_input">
                                @php($trainfrom = \App\Train::select('to')->groupBy('to')->get())
                                @foreach($trainfrom as $tfrom)
                                    <option>{{ $tfrom->to }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="find_item">
                            <div>Date:</div>
                            <input type="date" name="date" id="adventure" class="dropdown_item_select find_input" />

                        </div>


                        <button class="button find_button">Find</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About -->

<div class="about">
    <div class="container">

        <div class="row about_row">


                <!-- search items -->

                @if(isset($trains) && !$trains->isEmpty())
        <ul><h4 class="poppins"> Avilable Trains </h4>
            @foreach($trains as $train)

                <div class="m-3 card flex fexl-grow-1" style="max-width: 500px;">
                    <div class="row g-0">
                        <div class="col-sm-5">
                            <img src="{{ asset('storage/' . $train->image) }}"  class="card-img-top h-100" alt="...">
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

                                <a href="#" class="btn btn-primary stretched-link " onclick="showBookSeatsModal('{{ $train->id }}', '{{ $train->name }}', {{ $train->ticket_price }})">Book Seats</a><a href="/livelocation/{{ $train->id }}" class="ml-2 btn btn-success stretched-link">Live Track</a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    @else
    <h4>
        @if(isset($notFoundMessage))
            {!! $notFoundMessage !!}  </h4>
        @else
        <div class="about">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title text-center">
                            <h2>Ride the Rails: Unleash Your Adventure with us!</h2>

                        </div>
                    </div>
                </div>
                <div class="row about_row">
                    <div class="col-lg-6 about_col order-lg-1 order-2">
                        <div class="about_content">
                            <p>Embark on a journey of speed, reliability, and innovation with our train website. Get ready to witness the thrill of fast-paced travel without compromising on comfort and dependability. Our trains ensure you reach your destination swiftly, surrounded by modern amenities and attentive service. </p>
                            <p> Rest easy with our cutting-edge live tracking system, keeping you informed in real-time about your train's location and schedule. Say goodbye to uncertainty and embrace the convenience of knowing when you'll arrive.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 about_col order-lg-2 order-1">
                        <div class="about_image">
                            <img src=" {{ asset('frontend/images/about.jpg') }}" alt="">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif



    @endif


                <!-- Item -->


              <!-- Item -->




                <!-- end search items -->


        </div>
    </div>
</div>

<!-- Milestones -->

@endsection

@section('script')
    <script>

    </script>
@endsection
