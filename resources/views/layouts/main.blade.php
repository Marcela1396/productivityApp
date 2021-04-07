<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> Scrum Productivity </title>
        <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <!-- Google Fonts Roboto -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"/>
        <link href="{{ url('/MDbootstrap/css/mdb.min.css') }}" rel="stylesheet">
        <link href="{{ url('/MDbootstrap/css/style.css') }}" rel="stylesheet">
       
    </head>
    <body class="antialiased">
        @include('layouts.navegation')
        <div>
            @yield('content')
        </div>
        
       
        <footer class="text-center text-white" style="background-color: #0a4275;">
                <!-- Grid container -->
                <div class="container p-2 pb-0">
                <!-- Section: CTA -->
                <section class="">
                    <p class="d-flex justify-content-center align-items-center">
                        <div align="center"> <i class="fas fa-book-open fa-white"></i> </div>
                        Master of Science in Systems and Computing
                        <br> Software Development in Cloud Computing <br>
                    </p>
                </section>
                <!-- Section: CTA -->
                </div>
                <!-- Grid container -->

                <!-- Copyright -->
                <div class="text-center p-1" style="background-color:#1565C0;">
                    © 2021 Copyright:<br>
                    Ing. Sandra Marcela Guerrero Calvache 
                </div>
                <!-- Copyright -->
        </footer>
        <!-- Footer -->
       
        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="{{ url('/MDbootstrap/js/mdb.min.js') }}"></script>
    <!--   Core JS Files   -->  
    </body>
    
</html>
