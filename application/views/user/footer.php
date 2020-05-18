

<p class="text-center">
	copy rights parkgin
</p>
</body>
<script src="<?= base_url('js/jquery.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.js') ?>"></script>
<script>
	$("[data-tooltip]").attr("data-placement","right")
	$("[data-tooltip]").tooltip({"html":true}).tooltip("show")
	$(".parking-click.panel-default").click(function(){
		let row=$(this).attr("row")
		let col=$(this).attr("col")
		// alert(`row:${row},cols:${col}`)
		$(".parking-click").removeClass("panel panel-primary").addClass("panel panel-default")
		$(this).addClass("panel panel-primary")
		$("input[name=row]").val(row)
		$("input[name=col]").val(col)
	})
</script>
</html>
