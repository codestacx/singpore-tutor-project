@extends('application.layouts.app')
@section('title','Contact')
@section('content')
    <!-- MAIN START -->
    <main>
        <!-- Contact Start -->
        <section class="sl-contact-page">
            <div class="ourmap"></div>
            <div class="sl-contactformmap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="sl-contactfrm-container">
                                <div class="sl-lg-none col-xl-5">
                                    <div class="sl-contactformimg row">
                                        <figure>
                                            <img src="{{asset('static/images/contactimg/img-01.jpg')}}" alt="image">
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-7">
                                    <div class="sl-contactform row">
                                        <div class="sl-contactform__details">
                                            <h5>We’re More Than Happy To Serve </h5>
                                            <h2>Share Your Query With Us</h2>
                                            <p>Consectetur adipisicing elit sed dotiane eiusmod tempor incididunt utna labore etnalorale
                                                magna aliqua enim adman minim</p>
                                        </div>
                                        <form action="{{route('app.contact')}}" method="post" class="sl-formtheme sl-formcontactus">
                                           @csrf
                                            <fieldset>
                                                <div class="sl-formhalf">
                                                    <div class="form-group form-group-half">
                                                        <input type="text" name="Your Name" class="form-control"
                                                               placeholder="First Name">
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <input type="text" name="Your Email" class="form-control"
                                                               placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="Subject" class="form-control"
                                                           placeholder="Your Email">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Message" required=""></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn sl-btn">Send Message</button>
                                                </div>
                                            </fieldset>
                                        </form>
                                        <ul class="sl-contactusform">
                                            <li>
                                                <div class="sl-contactusform__description">
                                                    <p>
                                                        <a href="mailto:abc@example.com">info@domainurl.com</a>
                                                    </p>
                                                    <span>Say “Hello” to us</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sl-contactusform__description">
                                                    <p>0800-1234-567</p>
                                                    <span>Available support 24/7</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sl-contactusform__description">
                                                    <p>Manchester, UK</p>
                                                    <span>Our Location</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="sl-sociallisting">
                                <li class="sl-contactsocialadress">
                                    <div class="sl-facebook">
                                        <a href="javascript:void(0);" class="fab fa-facebook-f">
                                            <div class="sl-contactsocialadress__description">
                                                <p>/Servizsell</p>
                                                <span>Follow us on facebook</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li class="sl-contactsocialadress">
                                    <div class="sl-youtube">
                                        <a href="javascript:void(0);" class="fab fa-youtube">
                                            <div class="sl-contactsocialadress__description">
                                                <p>/Servizsell</p>
                                                <span>Follow us on youtube</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li class="sl-contactsocialadress">
                                    <div class="sl-twitter">
                                        <a href="javascript:void(0);" class="fab fa-twitter">
                                            <div class="sl-contactsocialadress__description">
                                                <p>/Servizsell</p>
                                                <span>Follow us on twitter</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                                <li class="sl-contactsocialadress">
                                    <div class="sl-instagram">
                                        <a href="javascript:void(0);" class="fab fa-instagram">
                                            <div class="sl-contactsocialadress__description">
                                                <p>/Servizsell</p>
                                                <span>Follow us on instagram</span>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact End -->
    </main>
    <!-- MAIN END -->
@endsection
