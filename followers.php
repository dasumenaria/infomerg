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
								 
							</div>
							<table class="table table-striped table-hover table-bordered area_wise" id="sample_editable_1">
							<thead>
								<tr>
									<th>S/No.</th>
									<th>Follower name</th>
									<th class="hidden-phone">Following name</th>
									<th class="hidden-phone">Following Date</th>
								</tr>
							</thead>
							<tbody>
										<?php
							$query=mysql_query("select * from `followers` order by id Desc");
							$i=0;
							while($fetch=mysql_fetch_array($query))
							{
							$i++;
							$id=$fetch['id'];
							$from_id=$fetch['from_id'];
								$query1=mysql_query("select * from `users` where id='".$from_id."'");
								$fetch1=mysql_fetch_array($query1); 
								 
								$from_name=$fetch1['name'];
								
							$to_id=$fetch['to_id'];
								$query2=mysql_query("select * from `users` where id='".$to_id."'");
								$fetch2=mysql_fetch_array($query2); 
								$id=$fetch2['id'];
								$to_name=$fetch2['name'];
							
							$curent_date=$fetch['curent_date']; 
							
							
							
							
							
							?>
										<tr class="odd gradeX">
											<td><?php echo $i;?></td>
											<td><?php echo $from_name;?></td>
											<td class="hidden-phone"><?php echo $to_name;?> </td>
											<td class="hidden-phone"><?php echo $curent_date;?></td>
  										</tr>
							<?php } ?>		 
									</tbody>
							</table>
						</div>
					</div>
<?php footer();?>
 