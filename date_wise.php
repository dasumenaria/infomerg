 
<?php 
include("config.php");

  $from=$_GET['from'];

  $to=$_GET['to'];



?>
	 <table class="table table-striped table-hover table-bordered " id="sample_editable_1">
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
						 	$query=mysql_query("select * from `users` WHERE `curent_date` BETWEEN '$from' AND '$to'");
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
											 <th class="hidden-phone"><a href="#" class="btn btn-xs yellow">Details<i class="fa fa-search"></i></a></th>
										</tr>
							<?php } ?>		 
									</tbody>
							</table>

 
 				
									
									
									
									


