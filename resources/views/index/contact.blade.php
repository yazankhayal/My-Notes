<section id="contacts-1" class="bg-fixed bg-lightgrey wide-100 contacts-section division">
    <div class="container">


        <!-- SECTION TITLE -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1 section-title">

                <!-- Title 	-->
                <h3 class="h3-md">Don’t Hasitate to Contact Us</h3>

            </div>
        </div>


        <!-- CONTACT FORM -->
        <div class="row">
            <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
                <div class="form-holder">
                    <form class="ajaxForm row contact-form update" enctype="multipart/form-data" data-name="update"
                          action="{{route('contact')}}" method="post">
                        {{csrf_field()}}

                        <form class="ajaxForm update" enctype="multipart/form-data" data-name="update"
                              action="{{route('profile.update')}}" method="post">
                        {{csrf_field()}}
                        <!-- Contact Form Input -->
                        <div id="input-name" class="col-lg-6">
                            <input type="text" id="name" name="name" class="form-control name" placeholder="Your Name*">
                        </div>

                        <div id="input-email" class="col-lg-6">
                            <input type="text" id="email" name="email" class="form-control email" placeholder="Email Address*">
                        </div>

                        <!-- Form Select -->
                        <div id="input-subject" class="col-md-12 input-subject">
                            <select id="subject" name="subject" class="custom-select subject">
                                <option value="Registering_Authorising">Registering/Authorising</option>
                                <option value="Troubleshooting">Troubleshooting</option>
                                <option value="Troubleshooting">Other</option>
                            </select>
                        </div>

                        <div id="input-message" class="col-lg-12 input-message">
                            <textarea id="message" class="form-control message" name="message" rows="6" placeholder="Your Message ..."></textarea>
                        </div>

                        <!-- Contact Form Button -->
                        <div class="col-lg-12 mt-10 form-btn text-right">
                            <button type="submit" class="btn btn-md btn-theme theme-hover submit">Send Your Message</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>	   <!-- END CONTACT FORM -->


    </div>	   <!-- End container -->
</section>	<!-- END CONTACTS-1 -->
