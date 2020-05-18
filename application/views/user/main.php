<div class="container">

<a class="btn btn-primary" href="<?= site_url('User/addVehicles') ?>">Add vehicle</a>

	<h1>All Vehicles {total}</h1>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>v_name</th>
				<th>v_brand</th>
				<th>v_number</th>
				<th>v_model</th>
				<th>v_type</th>
				<th>v_documents</th>
				<th>added_on</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			{vehicles}
			<tr>
				<td>{v_name}</td>
				<td>{v_brand}</td>
				<td>{v_number}</td>
				<td>{v_model}</td>
				<td>{v_type}</td>
				<td class="img">
					<?= img("vehicles-photo/{v_documents}")  ?>
				</td>
				<td>{added_on}</td>
				<td>
					<a class="btn btn-sm btn-warning" href=""><span class="fa fa-pencil"></span></a>
					<a class="btn btn-sm btn-danger" href=""><span class="fa fa-trash"></span></a>
					<a class="btn btn-sm btn-info" href=""><span class="fa fa-eye"></span></a>
				</td>
			</tr>
			{/vehicles}
		</tbody>
	</table>
	
		
 

 



<style type="text/css">
	.img img
	{
		width: 100px;
	}
</style>