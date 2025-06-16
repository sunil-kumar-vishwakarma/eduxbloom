@extends('frontent.layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/contactus.css') }}">
    <div class="container1">
        <h1>Contact Us</h1>
        <p class="contact-data">
            Our dedicated team is always ready to support you. Whether you have a question, need guidance, or just want
            to say hello, feel free to connect with us anytime. 
        </p>

        {{-- <div class="card-container">
            <div class="contact-card">
                <div class="mv-icon-circle"><i class="fas fa-envelope"></i></div>
                <h4>Email</h4>
                <a href="mailto:help@Edu-X.com">help@Edu-X.com</a>
                <hr />
                <p>Please email us with your inquiries.</p>
            </div>

            <div class="contact-card">
                <div class="mv-icon-circle"><i class="fas fa-comments"></i></div>
                <h4>Live Chat<br><small>[For registered users only]</small></h4>
                <a href="/student-login">Login</a>
                <hr />
                <p>Available 24/7</p>
            </div>

            <div class="contact-card">
                <div class="mv-icon-circle"><i class="fas fa-globe fa-fw"></i></div>
                <h4>Canada</h4>
                <p class="highlight">Toll Free: <a href="tel:18449727759">1-844-972-7759</a></p>
                <hr />
                <p>Monday–Friday<br>9 AM–5:30 PM EST</p>
            </div>

            <div class="contact-card">
                <div class="mv-icon-circle"><i class="fas fa-phone-alt"></i></div>
                <h4>India</h4>
                <p class="highlight">Toll Free: <a href="tel:18002083444">1-800-208-3444</a></p>
                <hr />
                <p>Available 24/7</p>
            </div>
        </div> --}}


        @if ($contacts->isEmpty())
            <h1>No contact information available.</h1><br>
        @else
            <div class="card-container">
                @foreach ($contacts as $contact)
                    <div class="contact-card">
                        <div class="mv-icon-circle"><i class="{{ $contact->icon_class }}"></i></div>
                        <h4>{{ $contact->title }}
                            {{-- @if ($contact->subtitle)
                                <br><small>[{{ $contact->subtitle }}]</small>
                            @endif --}}
                        </h4>
                        @if ($contact->link && $contact->link_text)
                            <p class="highlight"><a href="{{ $contact->link }}">{{ $contact->link_text }}</a></p>
                        @endif
                        <hr />
                        <p>{{ $contact->description }}</p>
                    </div>
                @endforeach
            </div>
        @endif



        <p class="txt">
            At Edu-X, we believe in delivering exceptional support and service. Whether you're exploring new educational
            opportunities or need help with an existing application, our team is here to provide prompt, reliable
            assistance. Reach out through any of our channels — we're just one message away!
        </p>

        <div class="social-icons">
            <a href="#" aria-label="LinkedIn" target="_blank"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.facebook.com/eduxservices/" aria-label="Facebook" target="_blank"><i
                    class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/edux_services/" aria-label="Instagram" target="_blank"><i
                    class="fab fa-instagram"></i></a>
            <a href="#" aria-label="TikTok" target="_blank"><i class="fab fa-tiktok"></i></a>
            <a href="#" aria-label="YouTube" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.4828259742403!2d-17.443674225074346!3d14.685266285811174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xec17324374a4171%3A0x53f6bf2f0180a813!2zQ2l0w6kgZGUgbOKAmcOJbWVyZ2VuY2U!5e0!3m2!1sen!2sin!4v1748340925727!5m2!1sen!2sin"
            width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>

        <br>
        <br>
        <br>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31151.27119444709!2d-8.096038363258542!3d12.588255480650743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe51cbe017ef2d23%3A0x300a9416d92b6a46!2s%C3%89changeur%20pour%20Pi%C3%A9tons%201!5e0!3m2!1sen!2sin!4v1748508197282!5m2!1sen!2sin"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>


    </div>
@endsection
