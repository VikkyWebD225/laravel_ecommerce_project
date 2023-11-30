<script src="{{asset('admin/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
<script src="{{asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/assets/js/misc.js')}}"></script>
<script src="{{asset('admin/assets/js/settings.js')}}"></script>
<script src="{{asset('admin/assets/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js')}}" ></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js')}}"></script>

<script type="text/javascript">

$(document).ready( function () {
    $('#myTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
} );


</script>





