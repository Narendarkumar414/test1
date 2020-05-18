
<div class="container">
	

	<table class="table table-hover">
		<thead>
			<tr>
				<th>vid</th>
				<th>v_name</th>
				<th>v_brand</th>
		        <th>v_number</th>
		        <th>v_model</th>
		        <th>v_type</th>
		        <th>v_document</th>
		        <th>added_on</th>
		        	</tr>
		</thead>
		<tbody>
			{payment}
			<tr>
				<th>{vid}</th>
				<th>{v_name}</th>
				<th>{v_brand}</th>
		        <th>{v_number}</th>
		        <th>{v_model}</th>
		        <th>{v_type}</th>
		        <td class="img">
					<?= img("vehicles-photo/{v_documents}")  ?>
				</td>
		        <th>{added_on}</th>

			</tr>
			{/payment}
		</tbody>
	</table>
</div>
