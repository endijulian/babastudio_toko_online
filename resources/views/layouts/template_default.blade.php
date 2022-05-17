<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.style')

</head>

<body>

    <aside id="left-panel" class="left-panel">
        @include('includes.sidebar')
    </aside>

    <div id="right-panel" class="right-panel">
        
        @include('includes.navbar')

        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        @include('includes.footer')
    </div>

    @include('includes.script')

</body>
</html>
