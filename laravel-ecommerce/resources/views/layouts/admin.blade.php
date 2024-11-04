<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard 2</title>
    <!-- bootstrap cdn link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- summernote cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/dist/css/adminlte.min.css">
    <!-- tostr css link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body>
    <div class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        @guest
        @else
        <div class="wrapper">
            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div>

            <!-- Navbar -->
            @include('layouts.admin_partial.navbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('layouts.admin_partial.sidebar')
            @endguest

            @yield('admin_content')
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jquery cdn  -->
    <!-- jQuery -->
    <script src="{{asset('public/backend')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{asset('public/backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('public/backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('public/backend')}}/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{asset('public/backend')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{asset('public/backend')}}/plugins/raphael/raphael.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{asset('public/backend')}}/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('public/backend')}}/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('public/backend')}}/dist/js/pages/dashboard2.js"></script>

    <!-- toastr js link  -->
    <script src="{{asset('public/backend')}}/plugins/toastr/toastr.min.js"></script>
    <!-- sweet alert js link -->
    <script src="{{asset('public/backend')}}/plugins/sweetalert/dist/sweetalert.min.js"></script>


    <!-- data table js links and plugins  -->
    <script src="{{asset('public/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/jszip/jszip.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('public/backend')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- summernote js cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.js" integrity="sha512-6rE6Bx6fCBpRXG/FWpQmvguMWDLWMQjPycXMr35Zx/HRD9nwySZswkkLksgyQcvrpYMx0FELLJVBvWFtubZhDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- summernote js code  -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.textarea').summernote();
        });
    </script>

    <!-- delete sweetalert script -->
    <script>
        $(document).on("click", ".delete", function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            swal({
                    title: 'Are you sure to delete',
                    text: "Once delte, This will parmanently delete",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal('save data');
                    }
                })
        })
    </script>

    <!-- logout sweetalert script -->
    <script>
        $(document).on("click", ".logout", function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            swal({
                    title: 'Are you sure to logout',
                    text: "If you logout again you can logon",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = link;
                    } else {
                        swal('Do not logout');
                    }
                })
        })
    </script>


    <!-- toastr script -->
    <script>
        @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}";
        switch (type) {
            case 'info':
                toastr.info("{{Session::get('message')}}");
                break;
            case 'success':
                toastr.success("{{Session::get('message')}}");
                break;
            case 'warning':
                toastr.warning("{{Session::get('message')}}");
                break;
            case 'error':
                toastr.error("{{Session::get('message')}}");
                break;
        }
        @endif
    </script>

    <!-- for datable script  -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>