<?php include('function.php');
include("config.php");
?>
 

<?php head();?>

<?php contain_start();?>
<div class="portlet box blue" >
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Posts
							</div>
							 
						</div>
						<div class="portlet-body" id="suv_category_result">
							<div class="table-toolbar">
								<div class="row">
								<!--<div class="col-md-2">
								 ------Areawise------- 
										<div class="form-group">
											<label class="control-label">Select State</label>
											<select class="select2_category form-control ids" data-placeholder="Choose a Category" tabindex="1">
												<option value="Category 1">Select State</option>
												<?php
												/*$query_state=mysql_query("select * from `states` order by id Asc ");
												 while($fetch_state=mysql_fetch_array($query_state)) 
												{
												$i++;
												$id=$fetch_state['id'];
												$name=$fetch_state['name'];
												*/?>
												<option value="<?php echo $id;?>"><?php echo $name;?></option>
											<?php /* }*/ ?>
										</select>
										</div>
								</div>
								<div class="col-md-2">
									<div class="form-group" id="cites_fet" >
										 
										 
									</div>
								</div>
									
									 
									 ------datewise----- 
									 --<div class="col-md-6">
									 <div class="form-group">
										<label class="control-label col-md-3">Date Range</label>
										<div class="col-md-4">
											<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
												<input type="text" class="form-control" name="from">
												<span class="input-group-addon">
												to </span>
												<input type="text" class="form-control" name="to">
											</div>
										 
											 
										</div>
									</div>
									 
									</div >-- 
									 
								</div>-->
							</div>
							<table class="table table-striped table-hover table-bordered area_wise" id="sample_editable_1">
							<thead>
										<tr>
											<th>S/No.</th>
											<th>Username</th>
											<th class="hidden-phone">Create Date & Time</th>
											<th class="hidden-phone">post Images</th>
										<!--<th class="hidden-phone">Photo</th>-->
 
										
										 
										</tr>
									</thead>
							<tbody>
										<?php
							$query=mysql_query("select * from `posts` order by id Desc");
							$i=0;
							while($fetch=mysql_fetch_array($query))
							{
							$i++;
							$id=$fetch['id'];
							$created_on=$fetch['created_on'];
							$post_image=$fetch['post_image'];
							$user_id=$fetch['user_id'];
							$query1=mysql_query("select * from `users` where id='$user_id'");
						    $fetch1=mysql_fetch_array($query1); 
							$name=$fetch1['name'];
								
							
							
							?>
										<tr class="odd gradeX">
											<td><?php echo $i;?></td>
											<td><?php echo $name;?></td>
											<td class="hidden-phone"> <?php echo $created_on;?> </td>
							 
											 <td class="center hidden-phone"><img src="upload/<?php echo $post_image;?>" width='50px' height='50px'></td> 
 
										</tr>
							<?php } ?>		 
									</tbody>
							</table>
						</div>
					</div>
<?php footer();?>
 