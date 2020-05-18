
<?php msg()  ?>

<div class="modal show" style="position: relative;z-index: -1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<?php echo form_open("User/changePassword") ?>
					<legend>Change Password</legend>
					<div class="form-group">
						<label for="">Old password</label>
						<input readonly class="form-control" id="" placeholder="{password}">
					</div>
					<div class="form-group">
						<label for="">New password</label>
						<?php echo form_input("password",set_value("password"),array("class"=>"form-control")) ?>
					</div>
					<?= form_error("password") ?>
					<div class="form-group">
						<label for="">key secret</label>
						<?php echo form_input("salt",set_value("salt"),array("class"=>"form-control")) ?>
					</div>
					<?= form_error("salt") ?>
						
				
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary">Save pasword</button>
			</div>
		</div>
				</form>
	</div>
</div>