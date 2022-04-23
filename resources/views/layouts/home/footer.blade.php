@php $setting = setting(); @endphp
@if($setting)
    <!-- FOOTER-2
    ============================================= -->
    <footer id="footer-2" class="pt-100 footer division">
        <div class="container">


            <!-- FOOTER CONTENT -->
            <div class="row">


                <!-- FOOTER INFO -->
                <div class="col-md-10 col-lg-9">
                    <div class="footer-info mb-40">

                        <!-- Footer Logo -->
                        <!-- For Retina Ready displays take a image with double the amount of pixels that your image will be displayed (e.g 268 x 60  pixels) -->
                        <img src="{{$setting->logo_black()}}" width="134" height="30" alt="{{$setting->name}}">

                        <!-- Text -->
                        <p>{!! $setting->body !!}</p>

                        <!-- Social Icons -->
                        <div class="footer-socials-links">
                            <ul class="foo-socials text-center clearfix">
                                {!! $setting->social() !!}
                            </ul>
                        </div>

                    </div>
                </div>


                <!-- FOOTER COMPANY LINKS -->
                <div class="col-md-3 col-lg-3">
                    <div class="footer-links mb-40">

                        <!-- Title -->
                        <h5 class="h5-xs">Get in Touch</h5>

                        <!-- Footer Links -->
                        <ul class="clearfix">
                            @foreach(pages() as $page)
                                <li><p><a href="{{route('page',['id'=>$page->id,'slug'=>$page->slug])}}">{{$page->name}}</a></p></li>
                            @endforeach
                        </ul>

                    </div>
                </div>


            </div>      <!-- END FOOTER CONTENT -->


            <!-- FOOTER COPYRIGHT -->
            <div class="row bottom-footer">
                <div class="col-md-12">
                    <div class="footer-copyright text-right">
                        <p>&copy; Designed &#38; Developed By <span><a href="http://yazan-khayal.co.uk/"
                                                                       title="Yazan Khayal Web Developer ( Laravel )">Yazan Khayal</a></span>
                            {{ date('Y') }}</p>
                    </div>
                </div>
            </div>


        </div>       <!-- End container -->
    </footer>    <!-- END FOOTER-2-->
@endif
