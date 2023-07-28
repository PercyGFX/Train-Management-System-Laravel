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

<style>
    .modal-dialog {
        display: flex;
        align-items: center;
        min-height: calc(100% - 1rem);
    }
</style>

@endsection
@section('content')
    <div class="maincontent">
        <div class="container bg-light rounded mb-5 p-5">
            <h2 class="poppins">All Available Trains</h2>

            <div class="row">
                <!-- Item -->
                @if (count($trains) > 0)

                    @foreach ($trains as $train)
                    <div class="m-3 card flex fexl-grow-1" style="max-width: 500px;">
                            <div class="row g-0">
                                <div class="col-sm-5">
                                    <img src="{{ asset('storage/' . $train->image) }}" class="card-img-top h-100"
                                        alt="...">
                                </div>
                                <div class="col-sm-7">
                                    <div class="card-body">
                                        <h3 class="card-title font-weight-bold poppins text-danger">{{ $train->name }}</h3>
                                        <h4 class="poppins"><span class="font-weight-bold">From: </span> {{ $train->from }}
                                        </h4>
                                        <h4 class="poppins"><span class="font-weight-bold">To:</span> {{ $train->to }}
                                        </h4>
                                        <h4 class="poppins"><span class="font-weight-bold">Date:</span> {{ $train->date }}
                                        </h4>
                                        <h4 class="poppins"><span class="font-weight-bold">Departure Time:</span>
                                            {{ $train->from_time }}</h4>
                                        <h4 class="poppins"><span class="font-weight-bold">Arrival Time:</span>
                                            {{ $train->to_time }}</h4>
                                        <h4 class="poppins text-success"><span class="font-weight-bold">Ticket Price:</span>
                                            RS {{ $train->ticket_price }}</h4>
  

                                            <a href="#" class="btn btn-primary stretched-link " onclick="showBookSeatsModal('{{ $train->id }}', '{{ $train->name }}', {{ $train->ticket_price }})">Book Seats</a><a href="/livelocation/{{ $train->id }}" class="ml-2 btn btn-success stretched-link">Live Track</a>

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

    <!-- MDAL-->
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
    
    



@endsection

@section('script')
    <script>

        
    </script>
@endsection
