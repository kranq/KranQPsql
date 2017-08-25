<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="http://localhost/svnprojects/KRQ/Source/1.0.0/public/images/img.png">
        <!-- ONLY INCLUDE IF YOU NOT HAVE THOSE DEPENDENCIES -->
        <link rel="stylesheet" href="vendor/rafwell/simple-grid/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
        <!-- CSS LARAVEL SIMPLEGRID -->
        <link rel="stylesheet" href="vendor/rafwell/simple-grid/css/simplegrid.css">
        <title>KranQ - Page Not Found</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- ONLY INCLUDE IF YOU NOT HAVE THOSE DEPENDENCIES -->
        <script src="vendor/rafwell/simple-grid/moment/moment.js"></script>
        <script type="text/javascript" src="vendor/rafwell/simple-grid/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

        <!-- JS LARAVEL SIMPLEGRID -->
        <script src="vendor/rafwell/simple-grid/js/simplegrid.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md" style="color: red;font-size: 50px;font-weight: bold;">
                    404 - Page Not Found
                </div>
                <a href="{{ URL::to('/') }}"><< Back</a>
            </div>
        </div>
    </body>
</html>
