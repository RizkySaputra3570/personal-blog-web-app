<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ url(path: '/assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url(path: '/assets/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css') }}">
        <title>{{ $title }} | CaptureStory</title>
    </head>
    <body>
        @include('components/main_layouts/navigation')
        <div class="row">
            <div class="col">
                <div class="container">
                    @yield('main_container')
                </div>
            </div>
        </div>
        @include('components/main_layouts/footer')
        <script src="{{ url(path: '/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url(path: '/assets/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    </body>
</html>