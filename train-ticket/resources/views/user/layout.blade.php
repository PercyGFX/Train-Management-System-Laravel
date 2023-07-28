<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Destino project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/about_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/about_responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">


	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @yield('style')
</head>

<style>
    .modal-dialog {
        display: flex;
        align-items: center;
        min-height: calc(100% - 1rem);
    }
</style>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_container d-flex flex-row align-items-center justify-content-start">

                            <!-- Logo -->
                            <div class="logo_container">
                                <div class="logo">
                                    <div>ETrain</div>
                                    <div>Train Agency</div>

                                </div>
                            </div>

                            <!-- Main Navigation -->
                            <nav class="main_nav ml-auto">
                                <ul class="main_nav_list">


{{--                                    <li class="main_nav_item"><a href="{{ route('livelocation') }}">Live Location</a></li>--}}
                                    <li class="main_nav_item {{request()->routeIs('home') ? 'active' : ''}}{{request()->routeIs('home/search') ? 'active' : ''}}"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="main_nav_item {{request()->routeIs('trains') ? 'active' : ''}}"><a href="{{ route('trains') }}">Trains</a></li>
                                    <li class="main_nav_item {{request()->routeIs('loyalty') ? 'active' : ''}}"><a href="{{ route('loyalty') }}">Loyality</a></li>
                                    <li class="main_nav_item {{request()->routeIs('contact') ? 'active' : ''}}"><a href="{{ route('contact') }}">Contact</a></li>
                                    @guest

                                        <li class="main_nav_item"><a href="{{ route('login') }}">Login</a></li>
                                        <li class="main_nav_item"><a href="{{ route('register') }}">Register</a></li>
{{--                                        @if (Route::has('register'))--}}
{{--                                            <li class="nav-item">--}}
{{--                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                            </li>--}}
{{--                                        @endif--}}
                                    @else
                                        <li class="main_nav_item {{request()->routeIs('userpanel') ? 'active' : ''}}"><a href="{{ route('userpanel') }}">User Panel</a></li>
                                        <li class="main_nav_item"><a   href="{{ route('logout') }}"
                                                                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>

                                        <li class="main_nav_item"><a href="{{ route('userpanel') }}">!Hi {{ auth()->user()->fname }}</a></li>

                                    @endguest
                                </ul>
                            </nav>

                            <!-- Search -->


                            <!-- Hamburger -->
                            <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>

                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Menu -->

        <div class="menu_container menu_mm">

            <!-- Menu Close Button -->
            <div class="menu_close_container">
                <div class="menu_close"></div>
            </div>

            <!-- Menu Items -->
            <div class="menu_inner menu_mm">
                <div class="menu menu_mm">

                    <ul class="menu_list menu_mm">
                        <li class="menu_item menu_mm"><a href="{{ route('home') }}">Home</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('trains') }}">Trains</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('loyalty') }}">Loyality</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('login') }}">Login</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('register') }}">Register</a></li>
                    </ul>

                    <!-- Menu Social -->




                </div>

            </div>

        </div>


        @yield('content')


        <!-- modal -->

           <!-- Modal -->
<div class="modal fade" id="bookSeatsModal" tabindex="-1" aria-labelledby="bookSeatsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookSeatsModalLabel">Book Seats for <span id="trainName"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="quantityInput">Quantity:</label>
                        <input type="number" class="form-control" id="quantityInput" name="quantity" min="1" value="1">
                    </div>
                    <!-- Display the total ticket price here -->
                    <p>Total Ticket Price: <span id="totalPrice"></span></p>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="bookBtn">Book</button>
            </div>
        </div>
    </div>
</div>

   

    <script>
        function showBookSeatsModal(trainId, trainName, ticketPrice) {
        // Update the modal with the train information
        document.getElementById('trainName').textContent = trainName;
        document.getElementById('totalPrice').textContent = 'RS ' + ticketPrice;

        // Set the train ID, train name, and ticket price as data attributes on the "Book" button
        const bookBtn = document.getElementById('bookBtn');
        bookBtn.setAttribute('data-train-id', trainId);
        bookBtn.setAttribute('data-train-name', trainName);
        bookBtn.setAttribute('data-ticket-price', ticketPrice);

        // Show the modal
        $('#bookSeatsModal').modal('show');
    }

    // When the "Book" button is clicked in the modal, handle the form submission and AJAX request
    document.getElementById('bookBtn').addEventListener('click', function () {
        const trainId = this.getAttribute('data-train-id');
        const trainName = this.getAttribute('data-train-name');
        const ticketPrice = parseFloat(this.getAttribute('data-ticket-price'));
        const quantity = parseInt(document.getElementById('quantityInput').value);
        const totalPrice = ticketPrice * quantity;

        // Create a form element
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '{{ route("paymentsummery") }}'; // Replace with your Laravel route URL

        // Create input fields for data
        const trainIdField = document.createElement('input');
        trainIdField.type = 'hidden';
        trainIdField.name = 'trainId';
        trainIdField.value = trainId;

        const trainNameField = document.createElement('input');
        trainNameField.type = 'hidden';
        trainNameField.name = 'trainName';
        trainNameField.value = trainName;

        const quantityField = document.createElement('input');
        quantityField.type = 'hidden';
        quantityField.name = 'quantity';
        quantityField.value = quantity;

        // Create CSRF token input field
        const csrfTokenField = document.createElement('input');
        csrfTokenField.type = 'hidden';
        csrfTokenField.name = '_token';
        csrfTokenField.value = '{{ csrf_token() }}'; // Laravel Blade directive to generate CSRF token

        // Check if the user is authenticated before adding the user ID field
        @auth
            // Create user ID input field
            const userIdField = document.createElement('input');
            userIdField.type = 'hidden';
            userIdField.name = 'user_id';
            userIdField.value = '{{ auth()->user()->id }}'; // Laravel Blade directive to get the user ID
            // Append the user ID field to the form
            form.appendChild(userIdField);
        @endauth

        // Append the input fields to the form
        form.appendChild(trainIdField);
        form.appendChild(trainNameField);
        form.appendChild(quantityField);
        form.appendChild(csrfTokenField);

        // Append the form to the document body and submit it
        document.body.appendChild(form);
        form.submit();
    });

    // When the quantity input changes, update the total ticket price
    document.getElementById('quantityInput').addEventListener('input', function () {
        const ticketPrice = parseFloat(document.getElementById('bookBtn').getAttribute('data-ticket-price'));
        const quantity = parseInt(this.value);
        const totalPrice = ticketPrice * quantity;
        document.getElementById('totalPrice').textContent = 'RS ' + totalPrice;
    });

        
    </script>
    


        <!-- Footer -->


        <footer class="footer">
            <div class="container">
                <div class="row">

                    <!-- Footer Column -->
                    <div class="col-lg-4 footer_col">
                        <div class="footer_about">
                            <!-- Logo -->
                            <div class="logo_container">
                                <div class="logo">
                                    <div>ETrain</div>
                                    <div>travel agency</div>

                                   

                            </div>
                            <div class="footer_about_text">We make your travel easier!</div>

                            <img src="{{ asset('frontend/payhere.png')}}" width="60%" />
                        </div>
                    </div>
                </div>
                <div class="copyright text-center">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> <i class="fa fa-heart-o" aria-hidden="true"></i>
                   
                </div>
               
            </div>
        </footer>
    </div>

    <script src="//code.jivosite.com/widget/nYpCjukm5c" async></script>

    


    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/js/about_custom.js') }}"></script>

    @yield('script')
</body>

</html>
