<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:400,300,700,800">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/color/default.css'); ?>">
	</head>
<body>
	<!-- Navigation -->
  	<nav class="navbar navbar-default" role="navigation">
	    <div class="container">
	      	<div class="navbar-header">
	        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	          		<span class="sr-only">Toggle nav</span>
	          		<span class="icon-bar"></span>
	          		<span class="icon-bar"></span>
	          		<span class="icon-bar"></span//>
	        	</button>
				<img src="<?= base_url('assets/img/mainlogo.png') ?>"/>
	        	<a class="navbar-brand" href="index.html">LaunchPad<br>
	        		<p style="font-size:14px;">We accomplish our dream</p>
	        	</a>
	      	</div>
	      	<div class="navigation collapse navbar-collapse navbar-ex1-collapse">
		        <ul class="nav navbar-nav">
		        	<li class="current"><a href="#intro">Home</a></li>
		          	<li><a href="#about">About</a></li>
		          	<li><a href="#services">Service</a></li>
		          	<li><a href="#portfolio">Works</a></li>
		          	<li><a href="#team">Team</a></li>
		          	<li><a href="#contact">Contact</a></li>
                <li><a href="<?= base_url(); ?>userController/login">Login</a></li>
                <li><a href="<?= base_url(); ?>userController/signUp">Create Account</a></li>
    				  	<!-- <li><a href="#contact">Idea Owners</a></li>
    				  	<li><a href="#contact">Ideas</a></li>
    				  	<li><a href="#contact">Investors</a></li> -->
		        </ul>
	      	</div>
	    </div>
  	</nav>
  	<!-- intro area -->