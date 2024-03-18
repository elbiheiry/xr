<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    @stack('meta')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    <!-- Links of CSS files -->
    <link rel="stylesheet" href="{{ surl('css/style.css') }}" />
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ surl('css/rtl.css') }}" />
    @endif

    <title>New level XR | XR Software House</title>

    <link rel="icon" type="image/png" href="{{ surl('images/favicon.png') }}" />
    <style>
        [data-notify="container"][class*="alert"] {
            border-width: 0px;
            border-radius: 50px;
            box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.3);
            letter-spacing: 1px;
            text-align: center;
        }

        [data-notify="container"].alert-danger {
            width: auto;
        }

        [data-notify="container"].alert-success {
            width: auto;
        }

        [data-notify="container"][class*="alert-"]>[data-notify="icon"] {
            display: inline;
        }

        [data-notify="container"][class*="alert-"]>[data-notify="message"] {
            font-weight: 400;
            display: inline;
            text-align: center;
            width: 100%;
        }

    </style>
</head>
