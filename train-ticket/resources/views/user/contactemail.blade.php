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

            <div class="container border">
            <div class="row d-flex justify-content-center">
                <div class="contact">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="contact_title">Contact with email</div>
                               
                            </div>

                            @if(isset($message))
                            <div class="alert alert-success" role="alert">
                                {{ $message }}
                            </div>
                         
                            </div>
                            @endif


                            @if ($errors->any())
                     <div class="error">
                              <ul>
                                                  @foreach ($errors->all() as $error)
                                             <div class="alert alert-danger" role="alert">
                                              {{ $error }}
                                                 </div>
              
                                                 @endforeach
                             </ul>
                       </div>
                         @endif


                        </div>
                        <div class="row contact_content">
                            <div class="col-lg-5">
                                <div class="contact_text">
                                    <p>We value your feedback and inquiries! Please don't hesitate to reach out to us using the contact form below. Whether you have questions, suggestions, or any other concerns, our team is here to assist you.</p>
                                    <p>For business-related queries, collaborations, or partnership opportunities, please use this form to get in touch. We are open to exploring mutually beneficial relationships and are excited to hear from you.</p>
                                </div>
                               
                            </div>
                            <div class="col-lg-7">
                                <div class="contact_form_container">
                                    <form action="/contact/email" method="POST" id="contact_form" class="clearfix">
                                        @csrf
                                        <input name="name" id="contact_input_name" class="contact_input contact_input_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
                                        <input name="email" id="contact_input_email" class="contact_input contact_input_email" type="text" placeholder="E-mail" required="required" data-error="E-mail is required.">
                                        <input name="subject" id="contact_input_subject" class="contact_input contact_input_subject" type="text" placeholder="Subject">
                                        <textarea name="message" id="contact_input_message" class="contact_message_input contact_input_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                                        <button id="contact_send_btn" type="submit" class="contact_send_btn trans_200" value="Submit">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
        </div>


            <div class="m-5"></div>
        </div>
    </div>


    <!-- Milestones -->

@endsection

@section('script')
    <script></script>
@endsection
