<?php
session_start();
require ("core/found404.php");

$found404 = new Found404();
$found404->start();
?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- google fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Rotobo">

		<!-- bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!--
		<script src="core/js/main.js"></script>
-->

		<title id="title">Page Title</title>
		<!-- nasconde il nav bar di altervista -->
		<style>
			#av_toolbar_regdiv, #av_toolbar_iframe, .av_site, .av-antipixel {
				display: none !important;
			}
			body {
				top: -32px !important;
			}
		</style>

		<style>
			.warning {
				text-align: center;
				display: none;
				background-color: #eee;
				border: 1px solid black;
				margin: 10px 20px;
				padding: 10px 20px;
			}
			body {
				font-size: 16px;
				font-family: Open Sans, Rotobo, sans-serif;
			}
			.title {
				color: white;
			}
			.update {
				color: grey;
				font-size: .8em;
			}
			article {
				font-size: 1em;
			}
			.mainHeader {
				background-color: purple;
			}

			/* On screens that are 991px or less, hide right advertisement and make visible the adv in bottom of the page */
			@media screen and (max-width: 991px) {
				#adv2 {
					display: none;
				}
			}
		</style>
	</head>
	<body>
		<header class="mainHeader">
			<div class="container">
				<div class="row">
					<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1"><img src="img/logo_gecko_small.png" alt="logo" />
					</div>
					<div class="col-xs-10 col-sm-4 col-md-4 col-lg-3">
						<h1 class="title">Filippo Taiuti</h1>
					</div>
					<div class="col-sm-7 col-md-7 col-lg-8">
						&nbsp;
					</div>
				</div>
			</div>

			<nav class="navbar navbar-default">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="active">
								<a href="#">Home <span class="sr-only">(current)</span></a>
							</li>
						</ul>
						<!--            <form class="navbar-form navbar-right">
						<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
						</form>
						<p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">Filippo Taiuti</a></p>
						-->
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container -->
			</nav>
		</header>

		<div align="center">
			<script>
				! function(d, l, e, s, c) {
					e = d.createElement("script");
					e.src = "//ad.altervista.org/js.ad/size=728X90/?ref=" + encodeURIComponent(l.hostname + l.pathname) + "&r=" + Date.now();
					s = d.scripts;
					c = s[s.length - 1];
					c.parentNode.insertBefore(e, c);
				}(document, location);
			</script>
		</div>
		<div id="main" class="container">
			<?php 
			require ($found404->getMainpage());
			?>
		</div><!-- end Main container -->
		<footer>
			<div style="background-color: #444444; height: 100px; color: white;">
				<p style="padding-left: 20px;">
					Web Site powered by Filippo Taiuti
				</p>
				<p style="padding-left: 20px;">
					Copyright by ... Copyright? what copyright???
				</p>
				<p style="padding-left: 20px;">
					Keep enjoying and have a fun days :D
				</p>
			</div>
		</footer>
	</body>
</html>