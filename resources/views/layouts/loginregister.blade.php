<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <title>@yield('title')</title>

    <style>
        body,
        html {
            height: 100%;
        }

        .bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.541), rgb(1, 7, 0)),
                url("home/images/gmbar.png");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .custom {
            background: linear-gradient(45deg,
                    rgba(26, 26, 26, 0.789),
                    rgba(59, 59, 59, 0.803));
            opacity: 1;
            border-radius: 20px;
        }

        .form-floating {
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <div class="bg">

        {{-- Form --}}
        @yield('content')
        {{-- End Form --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
