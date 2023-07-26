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
       <h2 class="poppins">User Panel</h2>

       <div class="container mt-4 border p-3">
       <!-- Item -->
      <h4> Booked Tickets:</h4>

      <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Train Name</th>
                <th>From</th>
                <th>To</th>
                <th>QTY</th>
                <th>Discount</th>
                <th>Amount</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>2023.7.30</td>
                <td>Ruhunu Kumari</td>
                <td>Galle</td>
                <td>Colombo</td>
                <td>5</td>
                <td>0</td>
                <td>1000 LKR</td>
                <td>DONE</td>
            </tr>
          
        </tbody>
        
    </table>

  <!-- Item -->


  

<!-- Item -->
</div>
    </div>


    

    
</div>








<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <!-- Milestones -->

@endsection

@section('script')
    <script>
new DataTable('#example');
    </script>
@endsection
