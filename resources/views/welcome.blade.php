

       <!DOCTYPE html>
       <html lang="en">
       <head>
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        html, body {
                background-color: #FFC;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 50vh;
                margin: 0;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 50px;
                position: relative;
                bottom: -80px;


            }
    </style>
       </head>
       <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
      
            <div class="content">
                    <div class="title m-b-md">
                        UNIVERSITY INFORMATION MANAGEMENT SYSTEM
                                      (UIMS)

                    </div>
       </body>
       </html>
        
    
    
           
        
    

