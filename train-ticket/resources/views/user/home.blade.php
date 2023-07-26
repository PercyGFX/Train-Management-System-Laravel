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
                    <form action="#" id="find_form" class="find_form d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-md-between justify-content-start flex-wrap">
                        <div class="find_item">
                            <div>From Location:</div>
                           <select name="fromlocation" id="adventure" class="dropdown_item_select find_input">
                                                           <option>Select</option>
                                                           <option>Categories</option>
                                                           <option>Categories</option>
                                                       </select>
                        </div>
                        <div class="find_item">
                            <div>To Location:</div>
                            <select name="tolocation" id="adventure" class="dropdown_item_select find_input">
                                <option>Select</option>
                                <option>Categories</option>
                                <option>Categories</option>
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


                <!-- Item -->
                <div class="m-3 card flex fexl-grow-1" style="max-width: 500px;">
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
                <div class="m-3 card flex fexl-grow-1" style="max-width: 500px;">
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
                <div class="m-3 card flex fexl-grow-1" style="max-width: 500px;">
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
