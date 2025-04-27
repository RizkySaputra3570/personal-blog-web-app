<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ url(path: '/assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ url(path: '/assets/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css') }}">
        <link rel="stylesheet" href="{{ url(path: '/assets/trix/dist/trix.css') }}">
        <style>
            trix-toolbar [data-trix-button-group="file-tools"] {
                display: none;
            }
        </style>
        <title>{{ $title }} | CaptureStory</title>
    </head>
    <body>
        @include('components/dashboard_layouts/dashnavbar')
        <div class="row">
            <div class="col">
                <div class="container">
                    @yield('dashboard_container')
                </div>
            </div>
        </div>
        @include('components/dashboard_layouts/dashfooter')
        <script src="{{ url(path: '/assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ url(path: '/assets/@popperjs/core/dist/umd/popper.min.js') }}"></script>
        <script src="{{ url(path: '/assets/trix/dist/trix.umd.min.js') }}"></script>
        <script>
            const name = document.querySelector('#name');
            const siug = document.querySelector('#slug');

            name.addEventListener('change', function () {
                fetch('/dashboard/category/convert?name=' + name.value)
                .then(response => response.json()).then(data => slug.value = data.slug);
            });
        </script>
        <script>
            document.addEventListener('trix-file-accept', function (event) {
                event.preventDefault();
            });
        </script>
        <script>
            function previewImage() {
                const img = document.querySelector('#post_image');
                const imgPreview = document.querySelector('.img-preview');
                const freader = new FileReader();
                img.style.display = 'block';
                freader.readAsDataURL(img.files[0]);
                freader.onload = function (frevent) {
                    imgPreview.src = frevent.target.result;
                }
            }
        </script>
    </body>
</html>