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
       <h2 class="poppins">Live Location data </h2>

       



       @if (!$locationData)
       <div class="mt-5 alert alert-danger" role="alert">
        Live tracking data not available. Either journey not started or finished. Please contact support to confirm.
      </div>
   @else
      
      


       <div class="container border p-3 my-3">

        <p class="text-danger">Updated Time: {{ $locationData->updated_at }}</p>

        @if ($trainData)
        <p>Train Name: {{ $trainData->name }}</p>
        <p>From: {{ $trainData->from }}</p>
        <p>To: {{ $trainData->to }}</p>
        <p>From Time: {{ $trainData->from_time }}</p>
        <p>To Time: {{ $trainData->to_time }}</p>
        <!-- Display train data -->
    @else
        <p>Train data not found for the specified train ID.</p>
    @endif

       </div>

       <div class="container border p-3">

        <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
        src="https://maps.google.com/maps?q={{ $locationData->lat }},{{ $locationData->lng }}&hl=es;z=14&amp;output=embed">

    </iframe>

    </div>

       <!-- Display other relevant data as needed -->
   @endif



      




<!-- Item -->
</div>
    </div>





</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


    <!-- Milestones -->

@endsection

@section('script')
    <script>

    </script>
@endsection
