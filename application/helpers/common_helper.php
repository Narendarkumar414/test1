<?php 


function  pre($a)
{
	echo "<pre>";
	print_r($a);
	echo "</pre>";
}
 ?>




<?php function msg()

{ 
$ci=&get_instance();

	?>
 <div class="container">
 	<?php if($ci->session->flashdata("msg")){ ?>
 		<div class="alert alert-info fade in">
 			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 			<strong><?= $ci->session->flashdata("msg")?></strong>
 		</div>
 	<?php } ?>
 </div>

<?php } ?>




<?php 


function parkedornotstatus($b)
{
	$ci=&get_instance();
	$a=$ci->db->query("select *  from parking where concat(r,',',c)='$b' and  status='parked'")->num_rows();	
	return $a;

}
function parkedornot($b)
{
	$ci=&get_instance();
	$a=$ci->db->query("select *,(select v_number from vehicles where v_number=parking.vid)as name  from parking where concat(r,',',c)='$b' and  status='parked' group by in_time")->result_array();	
	$type="";
	// pre($a);
	for($i=0;$i<count($a);$i++)	
	{
	switch ($a[$i]['type_of_vehicle']) {
			case 1:
				$type="fa fa-bicycle";
				break;
				
			
			default:
				$type="fa fa-car";
				break;
	}	
	// echo $type;
	$name=$a[$i]["name"];
		echo "<div data-tooltip title='$name' class='$type '></div>";
	}
}

function getpid($b)
{
	$ci=&get_instance();
	$a=$ci->db->query("select *,(select v_number from vehicles where v_number=parking.vid)as name  from parking where concat(r,',',c)='$b' and  status='parked' group by in_time")->result_array();	
	$type="";
	// pre($a);
	for($i=0;$i<count($a);$i++)	
	{
	switch ($a[$i]['type_of_vehicle']) {
			case 1:
				$type="fa fa-bicycle";
				break;
				
			
			default:
				$type="fa fa-car";
				break;
	}	
	// echo $type;
	$name=$a[$i]["name"];
	$pid=$a[$i]["pid"];
 ?>
	<a href="<?= site_url('User/checkout/'.$pid) ?>"  class="label label-default">checkout</a>	
<?php 
	}
}


function getImage()
{
	$ci=&get_instance();
	$pid=$ci->uri->segment(3,0);
	$a=$ci->db->query("select (select v_documents from vehicles where v_number=parking.vid) as image from  parking where pid=$pid")->result_array();
	if(count($a)>0)
	{
		$image=$a[0]["image"];
	echo img("vehicles-photo/$image");
	}
}

function filterByVid($a)
{
	$ci=&get_instance();
	$vid=$ci->uri->segment(3,0);
	$b=$ci->db->where("vid",$vid)->get("vehicles")->result_array();
	if(count($b)>0)
	{
		$v_number=$b[0]["v_number"];
		$c=array_filter($a,"abc");
	}
	else
	{
		echo "";
	}


}
function abc($item)
{
	return $item;
}

 ?>
