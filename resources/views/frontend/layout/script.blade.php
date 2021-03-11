<script src="{{asset('frontend/assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('frontend/assets/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('frontend/assets/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/easing/easing.js')}}"></script>
<script src="{{asset('frontend/assets/js/custom.js')}}"></script>

    <script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
