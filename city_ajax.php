<?php 
include("config.php");
$id=$_GET['id']; 


?>
	<label class="control-label">Select city</label>
		<select class="select2_category form-control cit" data-placeholder="Choose a Category" tabindex="1">
			<option value="Category 1">Select City</option>
			<?php
			$query_state=mysql_query("select * from `cities` where state_id='".$id."' ");
			while($fetch_state=mysql_fetch_array($query_state)) 
			{
		 
			$id=$fetch_state['id'];
			$name=$fetch_state['name'];
			?>
			<option value="<?php echo $id;?>"><?php echo $name;?></option>
			<?php  } ?>
		</select>

  
 				
<script>
  $('.cit').on('change', function(){
	  
 	var cit = $(this).val();  
	 
 	$.ajax({
			url: "area_wise_ajax.php?c_id="+cit,
			type: "POST",
			success: function(data)
			{   
				  $('.area_wise').html(data);
			}
		});
   });
  </script>  				
									