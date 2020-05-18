
<?php msg() ?>


<?php $a=array("class"=>"form-control") ?>
<div class="img" style="position: relative;">
	<?php echo img("images/p.jpg") ?>
   <div class="modal show" style="position: relative;">
	  <div class="modal-dialog modal-lg">
		  <div class="modal-content">
		 	 <div class="modal-header bg-primary">
				<h4 class="modal-title">Add Vehicle</h4>
			 </div>
			 <div class="modal-body">
				<?= form_open_multipart("User/addVehicle") ?>
					<div class="form-group">
						<label for="">name</label>
						<?= form_input("v_name",set_value("v_name"),$a)  ?>
					</div>
					<div class="form-group">
						<label for="">brand</label>
						<?= form_input("v_brand",set_value("v_brand"),$a)  ?>
					</div>
					<div class="form-group">
						<label for="">number</label>
						<?= form_input("v_number",set_value("v_number"),$a)  ?>
					</div>
					<div class="form-group">
						<label for="">model</label>
						<?= form_input("v_model",set_value("v_model"),$a)  ?>
					</div>
					<div class="form-group">
						<label for="">type</label>
						<?= form_input("v_type",set_value("v_type"),$a)  ?>
					</div>
					<div class="form-group">
						<label for="">comments</label>
						<?= form_input("comments",set_value("comments"),$a)  ?>
					</div>
					<div class="form-group">
						<label for="">upload supported document</label>
						<?= form_upload("v_documents",$a)  ?>
					</div>

					<button class="btn btn-primary">Add Vehicle</button>
				
				<?= form_close(); ?>		
				<?= validation_errors(); ?>	
			</div>
		</div>
	</div>
</div>		
  
<style type="text/css">
	img
	{
		position: absolute;
		width: 100%;
		height: 100%;
		/*padding-top: 5%;*/
		filter: hue-rotate(90deg);
	
		opacity: 0.3;
		 background-size: cover;
		 z-index: -1


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
		z-index: -1
	
	}
	.modal>.modal-dialog>.modal-content>.modal-header
	{
		background: rgba(255,255,255,0.2);
z-index: -1
	}
</style>
