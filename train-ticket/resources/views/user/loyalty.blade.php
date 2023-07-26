@extends('user.layout')
@section('title', 'Loyalty')
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
    </style>
@endsection
@section('content')

    <div class="maincontent">
        <div class="container">

            <div class="row d-flex justify-content-center">
                <div class="card m-3" style="width: 14rem;">
                    <img src="{{ asset('frontend/images/bronze.png') }}" class="card-img-top" alt="Sunset Over the Sea" />
                    <div class="card-body">
                        <p class="card-text text-center">Bronze</p>
                        <p class="card-text text-center">Get more than 50 Tikets with in the Year Get the Bronze Badge</p>
                    </div>
                </div>
                <div class="card m-3" style="width: 14rem;">
                    <img src="{{ asset('frontend/images/gold.png') }}" class="card-img-top" alt="Sunset Over the Sea" />
                    <div class="card-body">
                        <p class="card-text text-center">Gold</p>
                        <p class="card-text text-center">Get more than 300 Tikets with in the Year Get the Gold Badge</p>
                    </div>
                </div>
                <div class="card m-3" style="width: 14rem;">
                    <img src="{{ asset('frontend/images/silver.png') }}" class="card-img-top" alt="Sunset Over the Sea" />
                    <div class="card-body">
                        <p class="card-text text-center">Silver</p>
                        <p class="card-text text-center">Get more than 100 Tikets with in the Year Get the Silver Badge</p>
                    </div>
                </div>
            </div>
            <div class="m-5"></div>
        </div>
    </div>

@endsection

@section('script')
    <script></script>
@endsection
