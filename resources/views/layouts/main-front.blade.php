<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('tittle')</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/css/global.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">

    @include('layouts.global')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- NAVBAR -->

        @include('layouts.nav-front')
        @yield('nav-front')


        @yield('container')


        <!-- /.row -->
        <!-- Main row -->

        <!-- FOOTER -->
        @include('layouts.footer')
        @yield('footer')


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

<!--  -->