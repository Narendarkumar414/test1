<!DOCTYPE html>
<html>
<head>
<?= link_tag("css/bootstrap.css")  ?>
<?= link_tag("css/1.css")  ?>
<?= link_tag("css/font-awesome.css")  ?>
	<title></title>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= site_url('User/index') ?>">Parking App</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?= site_url('User/addVehicles') ?>">Add vehicle</a></li>
					<li><a href="<?= site_url('User/viewVehicle') ?>">View Vehicle</a></li>
					<li><a href="<?= site_url('User/viewParking') ?>">View Parking</a></li>
					<li><a href="<?= site_url('User/parkedVehicle') ?>">See Parked Vehicle </a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						 <?= img("uploads/".$this->session->userdata("pic"))  ?> 
						 <?= $this->session->userdata("name")  ?> 
						 <b class="caret"></b></a>
						<ul class="dropdown-menu">
							
							<li><a href="<?= site_url('User/history') ?>">view payments history</a></li>
							
							<li><a href="<?= site_url('User/password') ?>">change password</a></li>
							<li><a href="<?= site_url('User/logout') ?>">logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>	

	<style>
		.navbar
		{
			z-index: 4;
		}
		.nav.navbar-nav.navbar-right img
		{
			width: 30px;
		}
	</style>