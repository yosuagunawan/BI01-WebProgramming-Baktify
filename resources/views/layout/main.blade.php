<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
    {{-- <title>{{ $title }}</title> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/asset/Laravel_Icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    {{-- <style>
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #6EA8FE;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #0D6EFD;
        }
        .img-description {
            width: 50%;
            margin: auto;
        }
        li.nav-item>a {
            font-size: 1.5em;
        }
        @media only screen and (max-width: 992px) {
            .mainPost>h2 {
                font-size: 1em;
            }
            .mainPost>p {
                font-size: 0.75em;
            }
        }
    </style> --}}
</head>

<body>
    @include('partials.nav')

    <div class="container">
        @yield('section')
        <div class="row row-cols-lg-4 row-cols-sm-2">
            @yield('container')
        </div>
    </div>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
