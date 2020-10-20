<!DOCTYPE html>
<html>

<head>
    <title>@yield('tittle')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/css/global.css')}}">

    @include('layouts.global')
    <style>
        .cari{
            width:100% !important;
        }
        @media (max-width: 768px){
        .buton{
            margin-bottom: 10px;
            width:30px;
        }

        .cari{
            margin-top : 10px;
            margin-left : -20px;
        }
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- NAVBAR -->
        @include('layouts.topnav')
        @yield('topnav')
        <!-- Main Sidebar Container -->
        @include('layouts.sidenav')
        @yield('sidenav')

        @yield('container')


        <!-- /.row -->
        <!-- Main row -->


    </div>
    @include('sweetalert::alert')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>


$('.delete-confirm').click(function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
            title: `Are you sure you want to delete ${name} ?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
});

$("#checkall").click(function() {
    if ($("#checkall").is(':checked')) {
        $(".checkboxes").each(function() {
            $(this).prop("checked", true);
        });
        $(".delete-selected").attr("disabled", false);
    } else {
        $(".checkboxes").each(function() {
            $(this).prop("checked", false);
        });
        $(".delete-selected").attr("disabled", true);
    }
});

$('.delete-confirm-all').click(function(event) {
    var form = $(this).closest("form");
    event.preventDefault();
    swal({
            title: `Are you sure you want to delete all selected data ?`,
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
});

</script>
</body>

</html>