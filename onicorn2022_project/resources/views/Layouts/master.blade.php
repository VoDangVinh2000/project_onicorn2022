<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    @toastr_css
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>

</head>
<body>
    <div class="" id="wrapper">
        <!-- top bar !-->
        {{View::make('Layouts.topbar')}}

        <!-- Left sidebar !-->
        {{View::make('Layouts.left-sidebar')}}

        <!-- Content page !-->
        @yield('content')
    </div>
</body>
@jquery
@toastr_js
@toastr_render
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets/js/checkeditor.js')}}"></script>
<script src="{{asset('assets/js/admin/tabs.banner.js')}}"></script>
<script src="{{asset('assets/js/admin/tabs.head.js')}}"></script>
<script src="{{asset('assets/js/toastr.js')}}"></script>
<script type="text/javascript">
    var token = '{{csrf_token()}}';

</script>


