@if($intro)
    <section id="hero-4" class="hero-section" style="background-image: url('{{path().$intro->avatar}}');background-position: center bottom;">

        <!-- HERO-4 TEXT -->
        <div id="hero-4-txt" class="bg-scroll division">
            <div class="container white-color">
                <div class="row">
                    <div class="col-md-10 col-lg-8 offset-md-1 offset-lg-2">
                        <div class="hero-txt text-center">

                            <!-- Title -->
                            <h3 class="h3-lg wow fadeInUp" data-wow-delay="0.5s">
                                {{$intro->name}}
                            </h3>

                            <!-- Text -->
                            <p class="p-md wow fadeInUp" data-wow-delay="0.7s">
                                {!! $intro->body !!}
                            </p>

                        </div>
                    </div>
                </div>     <!-- End row -->
            </div>     <!-- End container -->
        </div>     <!-- END HERO-4 TEXT -->


        <!-- HERO-4 FORM -->
        <div class="container">
            <div class="hero-4-form">
                <div class="row">
                    <div class="col-md-8 col-lg-6 offset-md-2 offset-lg-3">
                        <div class="hero-form wow fadeInUp" data-wow-delay="0.9s">
                            @include("index.registerForm")
                        </div>
                    </div>
                </div>
            </div>
        </div>    <!-- END HERO-4-FORM -->


    </section>    <!-- END HERO-4 -->
@endif
