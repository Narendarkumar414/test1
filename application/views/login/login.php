<!DOCTYPE html>
<html>
<head>
<?= link_tag("css/1.css")  ?>
<?php $a=array("class"=>"form-control") ?>
<title></title>
</head>
<body>
	<?php echo img("images/4k-wallpaper-alloy-rim-automobile-1236809.jpg") ?>
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
					<?php echo form_open_multipart("Login/loginUser",array("class"=>"form-group","")); ?>
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
						</div>
						<div>
							<?php echo form_submit("","Login Me",array("class"=>"btn btn-success")) ?>
						</div>
					<?php echo form_close(); ?>
					<?= anchor("Login/signup","no a member")  ?>			
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
		/*filter: hue-rotate(90deg);*/
		filter: grayscale(100%);
		opacity: 0.3;
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



