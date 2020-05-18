<!DOCTYPE html>
<html>
<head>
<?= link_tag("css/1.css")  ?><?php $a=array("class"=>"form-control") ?><title></title>
</head>

<body>
		<div class="img" style="position: relative;">
	<?php echo img("images/C.jpg") ?>
	<div class="modal show" style="position: relative;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<p>Signup</p>
					<p>
						<?php echo $this->session->flashdata("msg") ?>
					</p>
				</div>
				<div class="modal-body">

					<?php echo form_open_multipart("Login/signupUser",array("class"=>"form-group","")); ?>
						<div>
							<b>name</b>
							<?php echo form_input("name",set_value("name"),$a) ?>
							<?= form_error("name")  ?>
						</div>
						<div>
							<b>email</b>
							<?php echo form_input("email",set_value("email"),$a) ?>
							<?= form_error("email")  ?>
						</div>
						<div>
							<b>phone</b>
							<?php echo form_input("phone",set_value("phone"),$a) ?>
							<?= form_error("phone")  ?>
						</div>
						<div>
							<b>enter a secret key</b>
							<?php echo form_input("salt",set_value("salt"),$a) ?>
							<?= form_error("salt")  ?>
						</div>
						<div>
							<b>password</b>
							<?php echo form_input("password",set_value("password"),$a) ?>
							<?= form_error("password")  ?>
						</div>
						<div>
							<b>confirm password</b>
							<?php echo form_input("confirm",set_value("confirm"),$a) ?>
							<?= form_error("confirm")  ?>
						</div>


						<div>
							<b>uload photo</b>
							<?php echo form_upload("x") ?>
							<?= form_error("x")  ?>
						</div>
						<div>
							<?php echo form_submit("","Signup Me",array("class"=>"btn btn-success")) ?>
						</div>
					<?php echo form_close(); ?>
					<?= anchor("Login/index","already a member")  ?>			
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<style type="text/css">
	img
	{
		position: absolute;
		width: 100%;
		height: 100%;
		/*padding-top: 5%;*/
		filter: hue-rotate(50deg);*/
	
		opacity: 0.3;
		 background-size: cover;
	}
	.modal>.modal-dialog>.modal-content
	{
		background: rgb(0,0,0,0.5);
		color:white;
		font-size: 200%;
		padding: 4%;
		outline: 10px solid white;
		box-shadow:0 10px 110px black inset;
		text-transform: capitalize;

	}
	.modal>.modal-dialog>.modal-content a
	{
		color:white;
		text-transform: capitalize;
	}
	.modal>.modal-dialog>.modal-content>.modal-header
	{
		background: rgba(255,255,255,0.2);
	}
</style>




