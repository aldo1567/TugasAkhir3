<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4 ">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="{{Storage::url(App\Company::all()->first()->logo)}}" alt="">
                            </a>
                        </div>
                        
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Address
                        </h3>
                        <span class="text-white">{!!App\Company::all()->first()->address!!}</span>
                    </div>
                </div>
                <div class="col-xl-4  col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            We’re Available
                        </h3>
                        <ul class="meting_time">
                            @foreach (App\Available::all() as $available)
                                <li class="d-flex justify-content-between "><span>{{$available->day}}</span> <span>{{$available->time}}</span></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="row">
                <div class="bordered_1px "></div>
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        By @Ronaldo
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- link that opens popup -->
<!-- form itself end-->


<!-- JS here -->
<script src="{{asset('user/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('user/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('user/js/popper.min.js')}}"></script>
<script src="{{asset('user/js/bootstrap.min.js')}}"></script>
<script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('user/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('user/js/ajax-form.js')}}"></script>
<script src="{{asset('user/js/waypoints.min.js')}}"></script>
<script src="{{asset('user/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('user/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('user/js/scrollIt.js')}}"></script>
<script src="{{asset('user/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('user/js/wow.min.js')}}"></script>
<script src="{{asset('user/js/nice-select.min.js')}}"></script>
<script src="{{asset('user/js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('user/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('user/js/plugins.js')}}"></script>
<script src="{{asset('user/js/gijgo.min.js')}}"></script>
<!--contact js-->
<script src="{{asset('user/js/contact.js')}}"></script>
<script src="{{asset('user/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('user/js/jquery.form.js')}}"></script>
<script src="{{asset('user/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('user/js/mail-script.js')}}"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@include('sweetalert::alert')
<script src="{{asset('user/js/main.js')}}"></script>
<script>
    $('.datepicker').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-calendar"></span>'
        }
    });

    $('.timepicker').timepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-clock-o"></span>'
        }
    });
$(document).ready(function() {
$('.js-example-basic-multiple').select2();
});
</script>
</body>

</html>