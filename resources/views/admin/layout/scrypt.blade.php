    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <!-- <script src="{{asset('admin/assets/vendor/chart.js/Chart.min.js')}}"></script> -->

    <!-- Page level custom scripts -->
<!--     <script src="{{asset('admin/assets/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/assets/js/demo/chart-pie-demo.js')}}"></script> -->
    {{-- data table --}}
    <script src="{{asset('admin/assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/demo/datatables-demo.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- tainput -->
    <script src="{{asset('admin/assets/bootstrap-tag/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('admin/assets/bootstrap-tag/bootstrap-tagsinput.min.js')}}"></script>


    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

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
<script>
$(document).ready(function() {
  //tooltip;
  // $('.tip').tooltip();
  //datepicker
  // $("#create_date").datepicker();

  //taginput
  $('#source-tags').tagsinput();

  //String to Slug
    // $("#title").stringToSlug({
    //     setEvents: 'keyup keydown blur',
    //     getPut: '#slug',
    //     space: '-'
    // });

});
</script>
    <script type="text/javascript">

        $(document).ready(function() {

          $('.summernote').summernote();

        });

    </script>