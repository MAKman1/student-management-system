<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Muhammadi Public School</title>



    <link href="https://fonts.googleapis.com/css?family=Staatliches" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Roboto+Condensed" rel="stylesheet">


    <!-- <link rel="stylesheet" href="../css/loginpage.css"> -->
    <link href="{{ asset('css/loginpage.css') }}" rel="stylesheet">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js" type="text/javascript"></script>
  
  
</head>
<body> 
	<div class="parentContainer">
			<div class="page">
				<div class="container">
					
					<img id="mainBackImage" src="{{ asset('assets/swirl-bg.svg') }}"/>
					<img id="mainBackImage2" src="{{ asset('assets/swirl-bg.svg') }}"/> 
					<!-- <img id="mainBackImage3" src="xandcross.png"/> -->
					<button class="bubbly-button" id="loginButton">
							NEW USER?
					</button>
					<!-- <button class="bubbly-button-white" id="signUpButton">
							NEW USER?
					</button> -->
					
					<div id="mainLogoText">
						<img src="./assets/instituteLogo.png" style="width:180px; height: 90px;"/>
						<!-- <h1 id="instituteTitleText">MUHAMMADI PUBLIC</h1> -->
						<!-- <h1 id="instituteTitleText" style="color: #0448a0;">SCHOOL</h1> -->
					</div>
					
					<div class="dateTimeWrapper">
						<div id="clock" class="dateTimeCenter clock"></div>
						<div id="month" class="dateTimeCenter month"></div>
						<div id="dates">
								<div id="date" class="date"></div>
								<div id="year" class="year"></div>
								<div id="day" class="day"></div>
						</div>
					</div>
					<div class="loginForm">
                      

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                </ul>
                            </div>
                        @endif
						<svg viewBox="0 0 320 300">
								<defs>
								<linearGradient
												inkscape:collect="always"
												id="linearGradient"
												x1="13"
												y1="193.49992"
												x2="307"
												y2="193.49992"
												gradientUnits="userSpaceOnUse">
									<stop
										style="stop-color:rgb(255, 255, 255);"
										offset="0"
										id="stop876" />
									<stop
										style="stop-color:rgb(199, 176, 240);"
										offset="1"
										id="stop878" />
								</linearGradient>
								</defs>
								<path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                            </svg>
                            
                            <form class="form" method="POST" action="{{ url('/login/checklogin') }}">
                            {{ csrf_field() }}
								<label for="username">Username</label>
								<input name="username" type="text" id="username">
								<label for="password">Password</label>
								<input name="password" type="password" id="password">
								<input type="submit" id="loginSubmitButton" value="LOGIN">
                            </form>
					</div>	
				</div>
			</div>
			<div class="loginSection">
					<div class="linkCloseButton">
						<span class="left">
						<span class="circle-left"></span>
						<span class="circle-right"></span>
						</span>
						<span class="right">
						<span class="circle-left"></span>
						<span class="circle-right"></span>
						</span>
					</div>
			</div>
	</div>
 



<script src="{{ asset('js/loginpage.js') }}" type="text/javascript"></script>
</body>
</html>
  