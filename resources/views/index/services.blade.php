<section id="services-2" class="wide-60 services-section division">
    <div class="container">
        <div class="row">


            @foreach($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="sbox-2 box-icon-sm wow fadeInUp" data-wow-delay="0.3s">

                        <!-- Icon -->
                        <span class="{{$service->icon}}"></span>

                        <!-- Title -->
                        <h5 class="h5-sm">{{$service->name}}</h5>

                        <!-- Text -->
                        <p class="grey-color">{!! $service->body !!}</p>

                    </div>
                </div>
            @endforeach


        </div>       <!-- End row -->
    </div>       <!-- End container -->
</section>    <!-- END SERVICES-2 -->
