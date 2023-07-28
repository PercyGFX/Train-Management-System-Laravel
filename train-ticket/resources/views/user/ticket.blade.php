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



 
/*-------------------- Boarding Pass --------------------*/
 .boarding-pass {
	
	
	
	
	 background: #fff;
	
	 box-shadow: 0 5px 30px rgba(0, 0, 0, .2);
	
	 text-transform: uppercase;
	/*-------------------- Header --------------------*/
	/*-------------------- Cities --------------------*/
	/*-------------------- Infos --------------------*/
	/*-------------------- Strap --------------------*/
}
 .boarding-pass small {
	 display: block;
	 font-size: 11px;
	 color: #a2a9b3;
	 margin-bottom: 2px;
}
 .boarding-pass strong {
	 font-size: 15px;
	 display: block;
}
 .boarding-pass header {
	 background: linear-gradient(to bottom, #36475f, #2c394f);
	 padding: 12px 20px;
	 height: 53px;
}
 .boarding-pass header .logo {
	 float: left;
	 width: 104px;
	 height: 31px;
}
 .boarding-pass header .flight {
	 float: right;
	 color: #fff;
	 text-align: right;
}
 .boarding-pass header .flight small {
	 font-size: 8px;
	 margin-bottom: 2px;
	 opacity: 0.8;
}
 .boarding-pass header .flight strong {
	 font-size: 18px;
}
 .boarding-pass .cities {
	 position: relative;
}
 .boarding-pass .cities::after {
	 content: '';
	 display: table;
	 clear: both;
}
 .boarding-pass .cities .city {
	 padding: 20px 18px;
	 float: left;
}
 .boarding-pass .cities .city:nth-child(2) {
	 float: right;
}
 .boarding-pass .cities .city strong {
	 font-size: 40px;
	 font-weight: 300;
	 line-height: 1;
}
 .boarding-pass .cities .city small {
	 margin-bottom: 0px;
	 margin-left: 3px;
}
 .boarding-pass .cities .airplane {
	 position: absolute;
	 width: 30px;
	 height: 25px;
	 top: 57%;
	 left: 30%;
	 opacity: 0;
	 transform: translate(-50%, -50%);
	 animation: move 3s infinite;
}
 @keyframes move {
	 40% {
		 left: 50%;
		 opacity: 1;
	}
	 100% {
		 left: 70%;
		 opacity: 0;
	}
}
 .boarding-pass .infos {
	 display: flex;
	 border-top: 1px solid #99d298;
}
 .boarding-pass .infos .places, .boarding-pass .infos .times {
	 width: 50%;
	 padding: 10px 0;
}
 .boarding-pass .infos .places::after, .boarding-pass .infos .times::after {
	 content: '';
	 display: table;
	 clear: both;
}
 .boarding-pass .infos .times strong {
	 transform: scale(0.9);
	 transform-origin: left bottom;
}
 .boarding-pass .infos .places {
	 background: #ececec;
	 border-right: 1px solid #99d298;
}
 .boarding-pass .infos .places small {
	 color: #97a1ad;
}
 .boarding-pass .infos .places strong {
	 color: #239422;
}
 .boarding-pass .infos .box {
	 padding: 10px 20px 10px;
	 width: 47%;
	 float: left;
}
 .boarding-pass .infos .box small {
	 font-size: 10px;
}
 .boarding-pass .strap {
	 clear: both;
	 position: relative;
	 border-top: 1px solid #99d298;
}
 .boarding-pass .strap::after {
	 content: '';
	 display: table;
	 clear: both;
}
 .boarding-pass .strap .box {
	 padding: 23px 0 20px 20px;
}
 .boarding-pass .strap .box div {
	 margin-bottom: 15px;
}
 .boarding-pass .strap .box div small {
	 font-size: 10px;
}
 .boarding-pass .strap .box div strong {
	 font-size: 13px;
}
 .boarding-pass .strap .box sup {
	 font-size: 8px;
	 position: relative;
	 top: -5px;
}
 .boarding-pass .strap .qrcode {
	 position: absolute;
	 top: 20px;
	 right: 20px;
	 width: 80px;
	 height: 80px;
}
 

 
    </style>
@endsection
@section('content')



    <div class="maincontent">
        <div class="container border">
          <h2> Your Ticket: </h2>
          
            <div class="container pb-4">

                <div class="boarding-pass">
                    <header>
                      <svg class="logo">
                        <use xlink:href="#alitalia"></use>
                      </svg>
                      <div class="flight">
                        <small>Train</small>
                        <strong>{{$ticket->train->name}}</strong>
                      </div>
                    </header>
                    <section class="cities">
                      <div class="city">
                        <small>From</small>
                  
                        <strong>{{$ticket->train->from}}</strong>
                      </div>
                      <div class="city">
                        <small>To</small>
                  
                        <strong>{{$ticket->train->to}}</strong>
                      </div>
                      <svg class="airplane">
                        <use xlink:href="#airplane"></use>
                      </svg>
                    </section>
                    <section class="infos">
                      <div class="places">
                        <div class="box">
                          <small>From Time</small>
                          <strong><em>{{$ticket->train->from_time}}</em></strong>
                        </div>
                        <div class="box">
                          <small>To Time</small>
                          <strong><em>{{$ticket->train->to_time}}</em></strong>
                        </div>
                        <div class="box">
                          <small>Seat Count</small>
                          <strong>{{$ticket->qty}}</strong>
                        </div>
                        <div class="box">
                          <small>Seat Price</small>
                          <strong>{{$ticket->ticket_price}}LKR</strong>
                        </div>
                      </div>
                      <div class="times">
                        <div class="box">
                          <small>Total Amount</small>
                          <strong>{{$ticket->totle_price}} LKR</strong>
                        </div>
                        <div class="box">
                          <small>Discount</small>
                          <strong>{{$ticket->discount}} LKR</strong>
                        </div>
                       <!-- <div class="box">
                          <small>Duration</small>
                          <strong>2:15</strong>
                        </div>
                        <div class="box">
                          <small>Arrival</small>
                          <strong>13:50</strong>
                        </div> -->
                      </div>
                    </section>
                    <section class="strap">
                      <div class="box">
                        <div class="passenger">
                          <small>passenger</small>
                          <strong>{{ $user->fname }} {{ $user->lname }}</strong>
                        </div>
                        <div class="date">
                          <small>Date</small>
                          <strong>{{$ticket->train->date}}</strong>
                        </div>
                        Payment Status : 
                        
                      </div>

                      <div class="mx-5 alert alert-warning" role="alert">
                        <strong>{{$ticket->status}}</strong>
                    </div>
                
                      <svg class="qrcode">
                     
                        <use xlink:href="#qrcode"></use>
                      </svg>
                    </section>
                  </div>
                  
                  
                  <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
                   
                    <symbol  id="airplane" viewBox="243.5 245.183 25 21.633">
                      <g>
                        <path d="M10 355 c0 -48 2 -55 20 -55 16 0 20 -7 20 -30 0 -23 -4 -30 -20 -30
-17 0 -20 -7 -20 -50 0 -43 4 -55 28 -75 34 -30 49 -31 79 -3 l23 21 23 -21
c27 -26 44 -28 67 -7 15 14 18 14 30 0 9 -11 33 -15 91 -15 77 0 90 5 68 27
-8 8 -3 13 19 18 75 16 67 67 -21 131 -120 89 -259 143 -364 144 l-43 0 0 -55z
m208 -1 c37 -15 76 -33 87 -40 19 -14 19 -14 -2 -14 -34 0 -128 38 -148 60
-23 26 -17 25 63 -6z m-94 -60 c9 -3 16 -17 16 -30 0 -21 -5 -24 -35 -24 -32
0 -35 2 -35 30 0 31 17 38 54 24z m96 -24 c0 -24 -15 -40 -36 -40 -20 0 -24 5
-24 28 0 26 3 28 30 24 17 -2 30 -8 30 -12z m90 -32 c0 -14 -28 -21 -54 -14
-18 4 -23 11 -19 25 4 16 9 17 39 8 19 -6 34 -14 34 -19z m85 -98 c4 -6 -15
-10 -49 -10 -31 0 -56 5 -56 10 0 6 22 10 49 10 28 0 53 -4 56 -10z m-290 -20
c-3 -5 -15 -10 -25 -10 -10 0 -22 5 -25 10 -4 6 7 10 25 10 18 0 29 -4 25 -10z
m115 0 c0 -5 -9 -10 -19 -10 -11 0 -23 5 -26 10 -4 6 5 10 19 10 14 0 26 -4
26 -10z"/>
</g>
                    </symbol>
                    <symbol id="qrcode" viewBox="0 0 130 130">
                     <g>
                      <path fill="#334158" d="M123,3h-5h-5h-5h-5h-5h-5v5v5v5v5v5v5v5h5h5h5h5h5h5h5v-5v-5v-5v-5v-5V8V3H123z M123,13v5v5v5v5h-5h-5h-5
                          h-5h-5v-5v-5v-5v-5V8h5h5h5h5h5V13z"/>
                      <polygon fill="#334158" points="88,13 88,8 88,3 83,3 78,3 78,8 78,13 83,13 	"/>
                      <polygon fill="#334158" points="63,13 68,13 73,13 73,8 73,3 68,3 68,8 63,8 58,8 58,13 53,13 53,8 53,3 48,3 48,8 43,8 43,13 
                          48,13 48,18 43,18 43,23 48,23 53,23 53,18 58,18 58,23 63,23 63,18 	"/>
                      <polygon fill="#334158" points="108,13 103,13 103,18 103,23 103,28 108,28 113,28 118,28 118,23 118,18 118,13 113,13 	"/>
                      <polygon fill="#334158" points="78,18 73,18 73,23 78,23 83,23 83,18 	"/>
                      <polygon fill="#334158" points="23,28 28,28 28,23 28,18 28,13 23,13 18,13 13,13 13,18 13,23 13,28 18,28 	"/>
                      <polygon fill="#334158" points="53,28 53,33 53,38 58,38 58,33 58,28 58,23 53,23 	"/>
                      <rect x="63" y="23" fill="#334158" width="5" height="5"/>
                      <rect x="68" y="28" fill="#334158" width="5" height="5"/>
                      <path fill="#334158" d="M13,38h5h5h5h5h5v-5v-5v-5v-5v-5V8V3h-5h-5h-5h-5h-5H8H3v5v5v5v5v5v5v5h5H13z M8,28v-5v-5v-5V8h5h5h5h5h5v5
                          v5v5v5v5h-5h-5h-5h-5H8V28z"/>
                      <polygon fill="#334158" points="48,33 48,28 43,28 43,33 43,38 48,38 	"/>
                      <polygon fill="#334158" points="83,38 88,38 88,33 88,28 88,23 83,23 83,28 78,28 78,33 83,33 	"/>
                      <polygon fill="#334158" points="23,43 18,43 13,43 8,43 3,43 3,48 8,48 13,48 18,48 23,48 28,48 28,43 	"/>
                      <rect x="108" y="43" fill="#334158" width="5" height="5"/>
                      <rect x="28" y="48" fill="#334158" width="5" height="5"/>
                      <polygon fill="#334158" points="88,53 93,53 93,48 93,43 88,43 88,48 83,48 83,53 	"/>
                      <polygon fill="#334158" points="123,48 123,43 118,43 118,48 118,53 118,58 123,58 123,63 118,63 113,63 113,68 118,68 118,73 
                          118,78 123,78 123,83 128,83 128,78 128,73 123,73 123,68 128,68 128,63 128,58 128,53 123,53 	"/>
                      <polygon fill="#334158" points="98,58 98,63 103,63 103,68 108,68 108,63 108,58 103,58 103,53 103,48 103,43 98,43 98,48 98,53 
                          93,53 93,58 	"/>
                      <rect x="108" y="53" fill="#334158" width="5" height="5"/>
                      <rect x="78" y="63" fill="#334158" width="5" height="5"/>
                      <rect x="93" y="63" fill="#334158" width="5" height="5"/>
                      <rect x="53" y="68" fill="#334158" width="5" height="5"/>
                      <polygon fill="#334158" points="108,73 108,78 108,83 113,83 113,78 113,73 113,68 108,68 	"/>
                      <rect x="13" y="73" fill="#334158" width="5" height="5"/>
                      <rect x="98" y="73" fill="#334158" width="5" height="5"/>
                      <polygon fill="#334158" points="18,83 18,88 23,88 28,88 28,83 23,83 23,78 18,78 	"/>
                      <polygon fill="#334158" points="8,83 8,78 8,73 8,68 13,68 13,63 13,58 13,53 8,53 3,53 3,58 3,63 3,68 3,73 3,78 3,83 3,88 8,88 	
                          "/>
                      <rect x="53" y="83" fill="#334158" width="5" height="5"/>
                      <rect x="73" y="83" fill="#334158" width="5" height="5"/>
                      <path fill="#334158" d="M108,88v-5h-5h-5h-5h-5v-5h5v-5h-5v-5h-5v5h-5h-5v-5h-5h-5v5h5v5h-5v5v5h5v-5h5v-5h5h5v5v5h-5v5h5v5h-5h-5
                          v5h5v5h5v5v5h-5v5h5h5h5v5h5h5h5h5h5h5h5v-5v-5v-5v-5v-5v-5v-5h-5h-5v-5v-5h-5v5H108z M98,118h-5v-5h5V118z M98,103h-5h-5v-5v-5v-5
                          h5h5h5v5v5v5H98z M123,118v5h-5h-5v-5h-5h-5v-5h5v-5h5v5v5h5v-5h5V118z M118,98h5v5h-5h-5v-5H118z"/>
                      <path fill="#334158" d="M28,93h-5h-5h-5H8H3v5v5v5v5v5v5v5h5h5h5h5h5h5h5v-5v-5v-5v-5v-5v-5v-5h-5H28z M33,103v5v5v5v5h-5h-5h-5h-5
                          H8v-5v-5v-5v-5v-5h5h5h5h5h5V103z"/>
                      <rect x="93" y="93" fill="#334158" width="5" height="5"/>
                      <polygon fill="#334158" points="63,98 68,98 68,93 63,93 58,93 53,93 53,88 48,88 48,83 43,83 43,78 48,78 48,73 43,73 43,68 
                          48,68 53,68 53,63 58,63 58,68 63,68 63,63 63,58 68,58 73,58 73,63 78,63 78,58 83,58 83,53 78,53 78,48 83,48 83,43 83,38 78,38 
                          78,33 73,33 73,38 73,43 68,43 68,38 68,33 63,33 63,38 63,43 63,48 68,48 73,48 73,53 68,53 63,53 58,53 58,58 53,58 53,53 53,48 
                          58,48 58,43 53,43 48,43 43,43 38,43 33,43 33,48 38,48 38,53 33,53 33,58 38,58 43,58 43,63 38,63 33,63 33,68 38,68 38,73 33,73 
                          28,73 28,68 28,63 33,63 33,58 28,58 23,58 18,58 18,63 23,63 23,68 18,68 18,73 23,73 23,78 28,78 33,78 38,78 38,83 33,83 33,88 
                          38,88 43,88 43,93 43,98 48,98 48,103 53,103 53,98 58,98 58,103 58,108 63,108 63,103 	"/>
                      <polygon fill="#334158" points="18,103 13,103 13,108 13,113 13,118 18,118 23,118 28,118 28,113 28,108 28,103 23,103 	"/>
                      <polygon fill="#334158" points="48,108 48,103 43,103 43,108 43,113 43,118 43,123 43,128 48,128 53,128 53,123 48,123 48,118 
                          48,113 53,113 58,113 58,108 53,108 	"/>
                      <polygon fill="#334158" points="78,118 78,113 78,108 73,108 68,108 63,108 63,113 68,113 68,118 63,118 63,123 63,128 68,128 
                          68,123 73,123 73,118 	"/>
                      <rect x="73" y="123" fill="#334158" width="5" height="5"/>
                  </g>
                    </symbol>
                  </svg>
                 
            </div>
        </div>
    </div>


    <!-- Milestones -->

@endsection

@section('script')
    <script></script>
@endsection
