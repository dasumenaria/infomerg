<?php include('function.php');
include("config.php");
?>
 

<?php head();?>

<?php contain_start();?>
<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-building-o "></i> Templete Categories
							</div>
							 
						</div>
						<div class="portlet-body">
							 
							<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
							<thead>
										<tr>
											<th>S/No.</th>
											<th>name</th>
											<th class="hidden-phone">Templete</th>
										 
										</tr>
									</thead>
							<tbody>
										<?php
							$query=mysql_query("select * from `templete_categories` where flag=0 ");
							$i=0;
							while($fetch=mysql_fetch_array($query))
							{
							$i++;
							$id=$fetch['id'];
							$name=$fetch['name'];
							$image=$fetch['image'];
							 
							
							?>
										<tr class="odd gradeX">
											<td><?php echo $i;?></td>
											<td><?php echo $name;?></td>
											<td class="center hidden-phone"><img src="upload/<?php echo $image;?>" width='100px' height='100px'></td>
											 
										</tr>
							<?php } ?>		 
									</tbody>
							</table>
						</div>
					</div>
<?php footer();?>

