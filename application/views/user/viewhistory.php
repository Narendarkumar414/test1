<div class="img" style="position: relative;">
	<?php echo img("images/b.jpg") 
<div class="container">
	{a}
	<div class="panel panel-default">
		<div class="panel-heading">
			{vid}
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
<div>
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
	.container
	{
		background: rgb(0,0,0,0.5);
		color:white;
		font-size: 200%;
		padding: 4%;
		outline: 10px solid white;
		box-shadow:0 10px 110px black inset;
		text-transform: capitalize;

	}
	
	
</style>



