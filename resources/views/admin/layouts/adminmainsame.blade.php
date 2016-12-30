<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link href="{{ asset('/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/admin/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{ asset('/admin/css/styles.css')}}" rel="stylesheet">

    <!--Icons-->
    <script src="{{ asset('/admin/js/lumino.glyphs.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{ asset('/admin/js/html5shiv.js')}}"></script>
    <script src="{{ asset('/admin/js/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>

@include('admin.Menu.nav')

@include('admin.Menu.sidebar')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        @include('admin.Menu.breadcrumb')
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">@yield('headername')</h1>
        </div>
    </div><!--/.row-->

    @yield('content')



</div>	<!--/.main-->

<script src="{{ asset('/admin/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset('/admin/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/admin/js/chart.min.js')}}"></script>
<script src="{{ asset('/admin/js/chart-data.js')}}"></script>
<script src="{{ asset('/admin/js/easypiechart.js')}}"></script>
<script src="{{ asset('/admin/js/easypiechart-data.j')}}s"></script>
<script src="{{ asset('/admin/js/bootstrap-datepicker.js')}}"></script>
<script src="{{ asset('/admin/js/myscript.js')}}"></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>
