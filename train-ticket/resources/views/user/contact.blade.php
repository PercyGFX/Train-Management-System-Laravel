@extends('user.layout')
@section('title', 'Contact Us')
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
                <a href="https://wa.link/c4ikq0" target="_blank">
                    <div class="card m-3" style="width: 14rem; height: 23rem;">
                        <img src="{{ asset('frontend/images/whatsapp.jpg') }}" class="card-img-top" alt="whatsapp" />
                        <div class="card-body p-0">
                            <p class="card-text text-center">WhatsApp</p>
                        </div>
                    </div>
                </a>

                <a href="/contact/email">
                    <div class="card m-3" style="width: 14rem; height: 23rem;">
                        <img src="{{ asset('frontend/images/gmail.png') }}" class="card-img-top" alt="gmail" />
                        <div class="card-body">
                            <p class="card-text text-center">Email</p>
                        </div>
                    </div>
                </a>
                <div class="card m-3" style="width: 14rem; height: 23rem;">
                    <img src="{{ asset('frontend/images/phone.jpg') }}" class="card-img-top" alt="phone" />
                    <div class="card-body">
                        <p class="card-text text-center m-0">Phone</p>

                        <p class="card-text text-center m-0">+94775001170</p>
                        <p class="card-text text-center m-0">Available 6 AM to 9 PM</p>
                    </div>
                </div>
                <!--  <div class="card m-3" style="width: 14rem;">
                        <img src="{{ asset('frontend/images/facebook.png') }}" class="card-img-top" alt="Sunset Over the Sea" />
                        <div class="card-body">
                            <p class="card-text text-center">Facebook</p>
                        </div>
                    </div>-->
            </div>
            <div class="m-5"></div>
        </div>
    </div>


    <!-- Milestones -->

@endsection

@section('script')
    <script></script>
@endsection
