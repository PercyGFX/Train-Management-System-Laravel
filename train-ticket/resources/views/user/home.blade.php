@extends('user.layout')
@section('title', 'Trains')
@section('style')
    <style>



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
                            <input type="text" class="destination find_input" required="required" placeholder="Keyword here">
                        </div>
                        <div class="find_item">
                            <div>To Location:</div>
                            <select name="adventure" id="adventure" class="dropdown_item_select find_input">
                                <option>Categories</option>
                                <option>Categories</option>
                                <option>Categories</option>
                            </select>
                        </div>

                        <div class="find_item">
                            <div>Date:</div>
                            <input type="date" name="adventure" id="adventure" class="dropdown_item_select find_input" />

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
                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img
                          src="https://mdbcdn.b-cdn.net/wp-content/uploads/2020/06/vertical.webp"
                          alt="Trendy Pants and Shoes"
                          class="img-fluid rounded-start"
                          style="max-height: 300px; object-fit: cover;"
                        />
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Train Name</h5>
                          <p class="card-text">
                            This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.
                          </p>
                          <p class="card-text">
                            <small class="text-muted">Last updated 3 mins ago</small>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                  
                    

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
