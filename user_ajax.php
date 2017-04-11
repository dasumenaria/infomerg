<?php 
include("config.php");
  $user_id=$_GET['id'];
?>

<?php
							$query=mysql_query("select * from `users` where `id`='".$user_id."' and flag=0 ");
							$fetch=mysql_fetch_array($query); 
							{
							$id=$fetch['id'];
							$name=$fetch['name'];
							$profile_pic=$fetch['profile_pic'];
							 
							}
							/* Follower*/
							$follower_no=mysql_query("select * from `followers` where `from_id`='".$user_id."'");
							$n_follower=mysql_fetch_array($follower_no); 
							{
							$id=$n_follower['id'];
							$from_id=$n_follower['from_id'];
							$set=mysql_query("select * from `followers` where `from_id`='$from_id'");
							$count_f=mysql_num_rows($set);
							
							}
							/* Following*/
							$following_no=mysql_query("select * from `followers` where `to_id`='".$user_id."'");
							$n_following=mysql_fetch_array($following_no); 
							{
							$id=$n_following['id'];
							$to_id=$n_following['to_id'];
							$set=mysql_query("select * from `followers` where `to_id`='$to_id'");
							$total_following=mysql_num_rows($set);
							
							}
							/* Post */
							$post_no=mysql_query("select * from `posts` where `user_id`='".$user_id."'");
							$n_posts=mysql_fetch_array($post_no); 
							{
							$id=$n_posts['id'];
							$user_id=$n_posts['user_id'];
							$set=mysql_query("select * from `posts` where `user_id`='$user_id'");
							$total_posts=mysql_num_rows($set);
							
							}
						 ?>



<div style="padding:10px;">
 <div class="row">
 <div class="col-md-3">
 <div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								<img src="upload/<?php echo $profile_pic;?>" class="img-responsive img-circle" style="border-radius:50%!important;">
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									<center><h3><?php echo $name;?></h3></center>
								</div>
								 
							</div>
							 
							<hr>
							<div class="profile-usermenu">
								<ul class="nav">
									<li class="active">
										<center>
											<div class="uppercase profile-stat-title">
											<span class="btn btn-circle green-haze btn-sm"><?php echo $count_f; ?></span>
											</div>
											<div class="uppercase profile-stat-text">
											Follower
											</div>
										</center> 
										<hr>
									</li>
									<li>
										<center>
											<div class="uppercase profile-stat-title">
											<span type="button" class="btn btn-circle btn-danger btn-sm"><?php echo $total_following;?></span>
											</div>
											<div class="uppercase profile-stat-text">
											Following
											</div> 
										</center>
										<hr>
									</li>
									<li>
										<center>
											<div class="uppercase profile-stat-title">
											<span type="button" class="btn btn-circle btn-primary btn-sm"><?php echo $total_posts;?></span>
											</div>
											<div class="uppercase profile-stat-text">
											Posts
											</div>
										</center>
									</li>
								 </ul>
							</div>

							<!-- END MENU -->
						</div>
						 
					</div>
 </div>
 <div class="col-md-9">
 <div class="profile-content">
						<div class="row">
							<div class="col-md-8" >
								<!-- BEGIN PORTLET -->
								<div class="portlet light " >
									<div class="portlet-title" style="background-color: #ffffff;">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											 <span class="caption-subject font-blue-madison bold uppercase" >Post</span> &nbsp;
											 <span type="button" class="btn btn-circle btn-danger btn-sm"><?php echo $total_posts;?></span>
										 </div>
									 </div>
									<div class="portlet-body">
										 <div class=" table-scrollable-borderless">
										 <?php 
												$count=0;
												$posts_i=mysql_query("select * from `posts` where `user_id`='".$user_id."'  ORDER BY ID DESC limit 5 " );
												
												while($no_posts=mysql_fetch_array($posts_i)) 
												{
												$count++;
												$id=$no_posts['id'];
												
												$post_image=$no_posts['post_image'];
												$created_on=$no_posts['created_on'];
												$set6=mysql_query("select * from `likes` where `post_id`='$id'");
												$fet6=mysql_fetch_array($set6); 
												$count_post=mysql_num_rows($set6);
											 
												 
												
											if($count==1 ){ echo '<div class="row" style="border:2px solid #eee;">'; }	
												
										?>
										  		<div class="col-md-2">
													<img src="upload/<?php echo $profile_pic;?>"width="55px" height="55px" style="margin-top: 6px;margin-left:-9px;">
												</div>
												<div class="col-md-10">
													<h4 style="margin-top: 17px;color: #428bca;font-weight:bold;"><?php echo $name; ?></h4>
												</div>
												<div class="col-md-12">
													<hr>
													<center>	
														<img src="upload/<?php echo $post_image;?>" width="100%" height="200px" style="margin-top:-10px;">
													</center> 
												</div>
												<div class=" col-md-12">
													<h6 align="right">
														<span style="margin-left: 20px; font-size:14px;"><i class="fa fa-thumbs-up " style="color:cornflowerblue;font-weight: bold;"></i>&nbsp; <?php echo $count_post;?></span>
														&nbsp; &nbsp; 
														<span style="margin-left: 20px;color:cornflowerblue;"><i class="fa fa-calendar"></i>&nbsp;<?php echo $created_on;?></span>  
													</h6>
												</div>
											          <?php  
		  echo '</div></br>';  
		  $count=0;
		 } ?>
											 
											 
										</div>
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
							<div class="col-md-4">
								<!-- BEGIN PORTLET -->
								<div class="portlet light ">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											 <span class="caption-subject font-blue-madison bold uppercase" >Follower</span> &nbsp;
											 <span class="btn btn-circle green-haze btn-sm"><?php echo $count_f; ?></span>
										 </div>
										 
									</div>
									<div class="portlet-body">
										 
										<div class=" table-scrollable-borderless">
											<table class="table table-hover table-light">
										 <?php 
												$follower_no=mysql_query("select * from `followers` where `to_id`='".$user_id."'  ORDER BY ID DESC limit 5 " );
												while($n_follower=mysql_fetch_array($follower_no)) 
												{
												$id=$n_follower['id'];
												$to_id=$n_follower['to_id'];
												$from_id=$n_follower['from_id'];
												
												$set2=mysql_query("select * from `users` where `id`='$from_id'");
												$fet2=mysql_fetch_array($set2); 
												$name=$fet2['name'];
												$profile_pic=$fet2['profile_pic'];
												
												?>
											<tr>
											
												<td class="fit">
													<img class="user-pic" src="upload/<?php echo $profile_pic;?>">
												</td>
												<td>
													<a href="#" class="primary-link"><?php echo $name;?></a>
												</td>
											<?php }?>	 
											</tr>
											 
											</table>
										</div>
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
						</div>
						 
					</div>
 </div>
 </div> 
 </div>
 


 
	 
  