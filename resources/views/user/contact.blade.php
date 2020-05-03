@extends('layouts.sona')
@section('content')
<!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-text">
                        <h2>Contact Info</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="c-o">Address:</td>
                                    <td>Jalan Bukit Ria, Taman Bukit Mewah, 43000 Kajang, Selangor</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Phone:</td>
                                    <td> (03) 118888989</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Email:</td>
                                    <td> sonaProperty@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="c-o">Fax:</td>
                                    <td> (03) 118888989</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <form action="{{route('contactcustomer.store')}}" class="contact-form" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-lg-6">Name:
                                <input type="text" name="name" placeholder="Your Name">
                            </div>
                            <div class="col-lg-6">Email:
                                <input type="text" name="email" placeholder="Your Email">
                            </div>
                            <div class="col-lg-12">Message:
                                <textarea type="text" placeholder="Your Message" name="message"></textarea>
                                <button type="submit">Submit Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3350.4881239402102!2d101.79807895967315!3d2.9796528436433793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd67623ac647c0f68!2sTiara%20Park%20Homes!5e0!3m2!1sen!2smy!4v1585687184280!5m2!1sen!2smy" height="470" style="border:0;" allowfullscreen="">
                </iframe>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection