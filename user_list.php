<?php include('function.php');
include("config.php");
?>
 

<?php head();?>

<?php contain_start();?>
<div class="portlet box blue" >
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>User's
							</div>
							 
						</div>
						<div class="portlet-body" id="suv_category_result">
							<div class="table-toolbar">
								<div class="row">
								<div class="col-md-3">
								<!------Areawise------->
										<div class="form-group">
											<label class="control-label">Select State</label>
											<select class="select2_category form-control ids select2me" data-placeholder="select..." tabindex="1">
												<option value="">Select...</option>
												<?php
												$query_state=mysql_query("select * from `states` order by id Asc ");
												 while($fetch_state=mysql_fetch_array($query_state)) 
												{
												$i++;
												$id=$fetch_state['id'];
												$name=$fetch_state['name'];
												?>
												<option value="<?php echo $id;?>"><?php echo $name;?></option>
											<?php  } ?>
										</select>
										</div>
								</div>
								<div class="col-md-3">
									<div class="form-group" id="cites_fet" >
										 <label class="control-label">Select City</label>
											<select class="select2_category form-control select2me" data-placeholder="select..." tabindex="1">
												<option value="">Select...</option>
 										</select>
									</div>
								</div>
									
								<div class="col-md-6">	 
									<!------datewise------->
									 <div class="form-group">
										<label class="control-label col-md-12">Date Range</label>
										<div class="col-md-4">
											<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
												<input type="text" class="form-control chk_input" name="from" id="from">
												<span class="input-group-addon">
												to </span>
												<input type="text" class="form-control chk_input" name="to" id="to">
											</div>
											<!-- /input-group -->
											 
										</div>
									</div>
								</div>	 
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered area_wise" id="sample_editable_1">
							<thead>
										<tr>
											<th>S/No.</th>
											<th>Username</th>
											<th class="hidden-phone">Email</th>
											<th class="hidden-phone">Mobile_no</th>
										<!--<th class="hidden-phone">Photo</th>-->
											<th class="hidden-phone">More</th>
										
										 
										</tr>
									</thead>
							<tbody>
										<?php
							$query=mysql_query("select * from `users` where flag=0 ");
							$i=0;
							while($fetch=mysql_fetch_array($query))
							{
							$i++;
							$id=$fetch['id'];
							$name=$fetch['name'];
							$email=$fetch['email'];
							$mobile=$fetch['mobile'];
							$profile_pic=$fetch['profile_pic'];
							
							?>
										<tr class="odd gradeX">
											<td><?php echo $i;?></td>
											<td><?php echo $name;?></td>
											<td class="hidden-phone"><a href="mailto:shuxer@gmail.com"><?php echo $email;?></a></td>
											<td class="hidden-phone"><?php echo $mobile;?></td>
											<!--<td class="center hidden-phone"><img src="upload/<?php echo $profile_pic;?>" width='100px' height='100px'></td>-->
											 <th class="hidden-phone"><a href="details.php?id=<?php echo $id;?>" class="btn btn-xs yellow" >Details <i class="fa fa-search"></i></a></th>
										</tr>
							<?php } ?>		 
									</tbody>
							</table>
						</div>
					</div>
<?php footer();?>
<script>
  $('.ids').on('change', function(){
	  
	   
	var ids = $(this).val();  
 
	$.ajax({
			url: "city_ajax.php?id="+ids,
			type: "POST",
			success: function(data)
			{   
				  $('#cites_fet').html(data);
			}
		});
   });
  </script>

  <!---For From date--->  
<script>
  $('.chk_input').on('change', function(){
	  alert();
	var froms= $('#from').val();			   
	 var tos= $('#to').val();
		
			$.ajax({
		url: "date_wise.php?from="+froms+"&to="+tos,
		}).done(function(response){
				$(".area_wise").html(""+response+"");
		});
	 
   });
  </script>