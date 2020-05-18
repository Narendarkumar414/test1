
<?php msg() ?>


<?php $a=array("class"=>"form-control") ?>
<div class="modal show" style="position: relative;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h4 class="modal-title">Checkout</h4>
			</div>
			<div class="modal-body">
				<?= form_open_multipart("User/checkoutProcess") ?>
					{a}
					<input name="pid" type="hidden" value="{pid}">
					<input name="uid" type="hidden" value="{uid}">
					<input name="status" type="hidden" value="{status}">
					<input name="vid" type="hidden" value="{vid}">
					<input name="r" type="hidden" value="{r}">
					<input name="c" type="hidden" value="{c}">
					<input name="in_time" type="hidden" value="{in_time}">
					<input name="out_time" type="hidden" value="<?= date('Y-m-d h:i:s') ?>">
					<input name="date_of_parking" type="hidden" value="{date_of_parking}">
					<input name="comments" type="hidden" value="{comments}">
					<input name="type_of_vehicle" type="hidden" value="{type_of_vehicle}">
					<kbd><?= $this->session->userdata("name") ?></kbd>
					<kbd>Vehicle:{vid}</kbd>
					{/a}
					<input name="total_time" type="hidden" value="{total_time}">
					<input name="charges" type="hidden" value="{fees}">

					<kbd>INR:{fees}</kbd>
					<kbd>Hours:{total_time}</kbd>
					<div class="form-group">
						<label for="">extra information</label>
						<?= form_textarea("extra",set_value("extra"),$a)  ?>
					</div>
					<div class="form-group">
						<?php getImage() ?>
					</div>

					<button class="btn btn-primary">Checkout</button>
				
				<?= form_close(); ?>		
				<?= validation_errors(); ?>	
			</div>
		</div>
	</div>
</div>