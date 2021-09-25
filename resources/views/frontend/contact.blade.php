@extends('frontend.main_master')
@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>contact us</h4>
                            <h2>let’s stay in touch!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Banner Ends Here -->


    <section class="contact-us">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="down-contact">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="sidebar-item contact-form">
                                    <div class="sidebar-heading">
                                        <h2>Send us a message</h2>
                                    </div>
                                    <div class="content">
                                        <form id="contact" action="{{ url('contact/send') }}" method="post">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input name="name" type="text" id="name" placeholder="Your name"
                                                               required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        @csrf
                                                        @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input name="email" type="text" id="email"
                                                               placeholder="Your email" required="">
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        @error('subject')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <input name="subject" type="text" id="subject"
                                                               placeholder="Subject">
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        @error('message')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <textarea style="text-transform: none" name="message" rows="6" id="message"
                                                                  placeholder="Your Message" required=""></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="main-button">Send
                                                            Message
                                                        </button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="sidebar-item contact-information">
                                    <div class="sidebar-heading">
                                        <h2>contact information</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <h5>{{ $setting->phone }}</h5>
                                                <span>PHONE NUMBER</span>
                                            </li>
                                            <li>
                                                <h5>{{ $setting->email }}</h5>
                                                <span>EMAIL ADDRESS</span>
                                            </li>
                                            <li>
                                                <h5>{{ $setting->address }}</h5>
                                                <span>STREET ADDRESS</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

@endsection
