<!DOCTYPE HTML>
<!--
	Read Only by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>StkFrnds @yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Styles -->
		<!--[if lte IE 8]><script src="{{asset('js/ie/html5shiv.js')}}"></script><![endif]-->
		<link rel="stylesheet" href="{{asset('css/main.css')}}">
		<!--[if lte IE 8]><link rel="stylesheet" href="{{asset('css/ie8.css')}}" /><![endif]-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

	</head>
	<body>

		<!-- Header -->
			<section id="header">
				<header>
					<span class="image avatar"><img src="images/avatar.jpg" alt="" /></span>
					<h1 id="logo"><a href="#">STK</a></h1>
					<p>USERNAME</p>
				</header>
				<nav id="nav">
					<ul>
						<li><a href="{{ url('/') }}" class="">HOME</a></li>
						<li><a href="{{ url('/stocks') }}" class="{{ Request::is('stocks') ? 'active': ''}}">Stocks</a></li>
						<li><a href="{{ url('/predictions') }}">Predictions</a></li>
						<li><a href="{{ url('/groups') }}">Groups</a></li>
					</ul>
				</nav>
				<footer>
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
					</ul>
				</footer>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						@yield('content')
					</div>

				<!-- Footer -->
					<section id="footer">
						<div class="container">
							<ul class="copyright">
								<li>&copy; StkFrnds. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
			<script src="{{ URL::asset('js/jquery.scrollzer.min.js') }}"></script>
			<script src="{{ URL::asset('js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ URL::asset('js/skel.min.js') }}"></script>
			<script src="{{ URL::asset('js/util.js') }}"></script>
			<!--[if lte IE 8]><script src="{{ URL::asset('js/ie/respond.min.js') }}"></script><![endif]-->
			<script src="{{ URL::asset('js/main.js') }}"></script>

	</body>
</html>