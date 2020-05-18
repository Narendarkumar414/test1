<div class="container">
<div class="img">
	<?= img("images/4k-wallpaper-alloy-rim-automobile-1236809.jpg") ?>
</div>

<?php msg(); ?>	
<?php echo form_open("User/addParking"); ?>
<select name="vid" required>
	<option>select a vehicle</option>
	{v}
	<option value="{v_number}">{v_name}</option>
	{/v}
</select>
<input name="row" value="1" type="hidden">
<input name="col" value="1"  type="hidden">
<input name="extra" value="i just parked keep eye on my vehicle" >
<select name="type_of_vehicle" required>
	<option value="" selected disabled>select a type</option>
	<option value="4">4 wheeler</option>
	<option value="2">2 wheeler</option>
	<option>1</option>
</select>
<button class="btn btn-info btn-sm">Park my vehicle</button>
<table class="table table-hover">
	<tbody>
			<?php for($i=1;$i<=5;$i++){ ?>
		<tr>
			<?php for($j=1;$j<=5;$j++){ ?>
			<td>
				<div class="panel panel-<?= parkedornotstatus($i.','.$j)?'primary':'default'; ?> parking-click" row="<?=$i?>" col="<?=$j?>" >
					<div class="panel-heading">
						<div class="badge"><?=$i?>,<?=$j?></div>
						<div class="badge"><?= parkedornotstatus($i.','.$j)?'parked':'free'; ?></div>
					</div>
					<div class="panel-body">
						<?php parkedornot($i.",".$j) ?>
					</div>
					<div class="panel-footer">
						<?php if(parkedornotstatus($i.",".$j)){ ?>
						<?php getpid($i.",".$j) ?>
					<?php } ?>
					</div>
				</div>
			</td>
			<?php } ?>
		</tr>
			<?php } ?>
	</tbody>
</table>
<?php echo form_close(); ?>

</div>

<style type="text/css">
	.img>img
	{
		width: 100%;
		height: 100%;
		position: absolute;
		top:0;
		left:0;
		opacity: 0.4;
		z-index: -1
	}
	.panel
	{
		box-shadow:0 10px 10px black;
	}
	.table-hover
	{
		/*background: red;*/
	}
</style>