<div class="container">
	{a}
	<div class="panel panel-default">
		<div class="panel-heading">
			{v_number}
			<div class="badge">
				{v_model}
			</div>	
			<div class="badge">
				{v_brand}
			</div>	
			
		</div>
		<div class="panel-body">
			<?= img("vehicles-photo/{v_documents}")  ?>
		</div>
		<div class="panel-footer">
			<a type="a" href="<?= site_url('User/viewHistory/{vid}')  ?>" class="btn btn-sm btn-info">View History</a>
		</div>
	</div>
	
	{/a}
</div>
