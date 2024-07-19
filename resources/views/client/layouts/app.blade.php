<!DOCTYPE html>
<html lang="en-us">
<head>
    @include('client.layouts.head')
</head>
<body>

<!-- navigation -->
@include('client.layouts.header')
<!-- /navigation -->

@yield('content')

@include('client.layouts.footer')

<!-- JS Plugins -->
<script src="{{ asset('theme/client/plugins/jQuery/jquery.min.js') }}"></script>

<script src="{{ asset('assets/client/plugins/bootstrap/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/client/plugins/slick/slick.min.js') }}"></script>

<script src="{{ asset('assets/client/plugins/instafeed/instafeed.min.js') }}"></script>


<!-- Main Script -->
<script src="{{ asset('theme/client/js/script.js') }}"></script>
</body>
</html>
