<?php include('function.php');
include("config.php");
?>
<?php head();?>
<?php contain_start();?>
 <div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>User Details
							</div>
							 
						</div>
						<div class="portlet-body form" id="suv_category_result" style="background:#F1F3FA;"> 
						<div class="row">
							<div class="col-md-4">
						
							  <div class="form-body">
										<label>&nbsp;Select User name</label>
										<select class="form-control ids	" width="250px">
											<option>- - - - - - - -Select User name- - - - - - - -</option>
											<?php
										$user_name=mysql_query("select * from users order by id Asc");
										while($fet_name=mysql_fetch_array($user_name))
										{
										echo "<option value=".$fet_name['id'].">".$fet_name['name']."</option>";
										}
									?> 
										</select>
									 
									 
								</div>
								 
							</div>
					</div> 
						</div>
					</div>
<?php footer();?>

 <script>
  $('.ids').on('change', function(){
	   
	   
	var ids = $(this).val();  
	$.ajax({
			url: "user_ajax.php?id="+ids,
			type: "POST",
			success: function(data)
			{   
				  $('#suv_category_result').html(data);
			}
		});
   });
  </script>