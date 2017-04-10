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
							$count=mysql_num_rows($set);
							
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
								<img src="upload/<?php echo $profile_pic;?>" class="img-responsive" alt="" width="250px" height="100px">
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									<center><h3><?php echo $name;?></h3></center>
								</div>
								 
							</div>
							 
							<hr>
							<div class="row list-separated profile-stat">
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										 <span class="btn btn-circle green-haze btn-sm"><?php echo $count; ?></span>
									</div>
									<div class="uppercase profile-stat-text">
										Follower
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										<span type="button" class="btn btn-circle btn-danger btn-sm"><?php echo $total_following;?></span>
									</div>
									<div class="uppercase profile-stat-text">
										 Following
									</div>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<div class="uppercase profile-stat-title">
										<span type="button" class="btn btn-circle btn-primary btn-sm"><?php echo $total_posts;?></span>
									</div>
									<div class="uppercase profile-stat-text">
										 Posts
									</div>
								</div>
							</div>
							<!-- END MENU -->
						</div>
						 
					</div>
 </div>
 <div class="col-md-9">
 <div class="profile-content">
						<div class="row">
							<div class="col-md-6">
								<!-- BEGIN PORTLET -->
								<div class="portlet light ">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											 <span class="caption-subject font-blue-madison bold uppercase">Post</span> 
											<span class="caption-helper hide">weekly stats...</span>
										</div>
										 
									</div>
									<div class="portlet-body">
										<div class="row number-stats margin-bottom-30">
											<div class="col-md-6 col-sm-6 col-xs-6">
												<div class="stat-left">
													<div class="stat-chart">
														<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
														<div id="sparkline_bar"></div>
													</div>
													<div class="stat-number">
														<div class="title">
															 Total
														</div>
														<div class="number">
															 2460
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-6 col-sm-6 col-xs-6">
												<div class="stat-right">
													<div class="stat-chart">
														<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
														<div id="sparkline_bar2"></div>
													</div>
													<div class="stat-number">
														<div class="title">
															 New
														</div>
														<div class="number">
															 719
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="table-scrollable table-scrollable-borderless">
											<table class="table table-hover table-light">
											<thead>
											<tr class="uppercase">
												<th colspan="2">
													 MEMBER
												</th>
												<th>
													 Earnings
												</th>
												<th>
													 CASES
												</th>
												<th>
													 CLOSED
												</th>
												<th>
													 RATE
												</th>
											</tr>
											</thead>
											<tr>
												<td class="fit">
													<img class="user-pic" src="assets/admin/layout3/img/avatar4.jpg">
												</td>
												<td>
													<a href="#" class="primary-link">Brain</a>
												</td>
												<td>
													 $345
												</td>
												<td>
													 45
												</td>
												<td>
													 124
												</td>
												<td>
													<span class="bold theme-font">80%</span>
												</td>
											</tr>
											 </table>
										</div>
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
							<div class="col-md-6">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Follower</span>
										</div>
										 <div class="table-scrollable table-scrollable-borderless">
											<table class="table table-hover table-light">
										 <?php 
												$follower_no=mysql_query("select * from `followers` where `to_id`='".$user_id."'");
												while($n_follower=mysql_fetch_array($follower_no)) 
												{
												$id=$n_follower['id'];
												$to_id=$n_follower['to_id'];
												$from_id=$n_follower['from_id'];
												$set2=mysql_query("select * from `users` where `id`='$from_id'");
												$fet2=mysql_fetch_array($set2); 
												$name=$fet2['name'];
												
												?>
											<tr>
											
												<td class="fit">
													<img class="user-pic" src="assets/admin/layout3/img/avatar5.jpg">
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
						<div class="row">
							<div class="col-md-6">
								<!-- BEGIN PORTLET -->
								<div class="portlet light">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Customer Support</span>
											<span class="caption-helper">45 pending</span>
										</div>
										<div class="inputs">
											<div class="portlet-input input-inline input-small ">
												<div class="input-icon right">
													<i class="icon-magnifier"></i>
													<input type="text" class="form-control form-control-solid" placeholder="search...">
												</div>
											</div>
										</div>
									</div>
									<div class="portlet-body">
										<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
											<div class="general-item-list">
												<div class="item">
													<div class="item-head">
														<div class="item-details">
															<img class="item-pic" src="assets/admin/layout3/img/avatar4.jpg">
															<a href="" class="item-name primary-link">Nick Larson</a>
															<span class="item-label">3 hrs ago</span>
														</div>
														<span class="item-status"><span class="badge badge-empty badge-success"></span> Open</span>
													</div>
													<div class="item-body">
														 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</div>
												</div>
												<div class="item">
													<div class="item-head">
														<div class="item-details">
															<img class="item-pic" src="assets/admin/layout3/img/avatar3.jpg">
															<a href="" class="item-name primary-link">Mark</a>
															<span class="item-label">5 hrs ago</span>
														</div>
														<span class="item-status"><span class="badge badge-empty badge-warning"></span> Pending</span>
													</div>
													<div class="item-body">
														 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet.
													</div>
												</div>
												<div class="item">
													<div class="item-head">
														<div class="item-details">
															<img class="item-pic" src="assets/admin/layout3/img/avatar6.jpg">
															<a href="" class="item-name primary-link">Nick Larson</a>
															<span class="item-label">8 hrs ago</span>
														</div>
														<span class="item-status"><span class="badge badge-empty badge-primary"></span> Closed</span>
													</div>
													<div class="item-body">
														 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.
													</div>
												</div>
												<div class="item">
													<div class="item-head">
														<div class="item-details">
															<img class="item-pic" src="assets/admin/layout3/img/avatar7.jpg">
															<a href="" class="item-name primary-link">Nick Larson</a>
															<span class="item-label">12 hrs ago</span>
														</div>
														<span class="item-status"><span class="badge badge-empty badge-danger"></span> Pending</span>
													</div>
													<div class="item-body">
														 Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</div>
												</div>
												<div class="item">
													<div class="item-head">
														<div class="item-details">
															<img class="item-pic" src="assets/admin/layout3/img/avatar9.jpg">
															<a href="" class="item-name primary-link">Richard Stone</a>
															<span class="item-label">2 days ago</span>
														</div>
														<span class="item-status"><span class="badge badge-empty badge-danger"></span> Open</span>
													</div>
													<div class="item-body">
														 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet dolore magna aliquam erat volutpat.
													</div>
												</div>
												<div class="item">
													<div class="item-head">
														<div class="item-details">
															<img class="item-pic" src="assets/admin/layout3/img/avatar8.jpg">
															<a href="" class="item-name primary-link">Dan</a>
															<span class="item-label">3 days ago</span>
														</div>
														<span class="item-status"><span class="badge badge-empty badge-warning"></span> Pending</span>
													</div>
													<div class="item-body">
														 Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</div>
												</div>
												<div class="item">
													<div class="item-head">
														<div class="item-details">
															<img class="item-pic" src="assets/admin/layout3/img/avatar2.jpg">
															<a href="" class="item-name primary-link">Larry</a>
															<span class="item-label">4 hrs ago</span>
														</div>
														<span class="item-status"><span class="badge badge-empty badge-success"></span> Open</span>
													</div>
													<div class="item-body">
														 Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- END PORTLET -->
							</div>
							<div class="col-md-6">
								<!-- BEGIN PORTLET -->
								<div class="portlet light tasks-widget">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Tasks</span>
											<span class="caption-helper">16 pending</span>
										</div>
										<div class="inputs">
											<div class="portlet-input input-small input-inline">
												<div class="input-icon right">
													<i class="icon-magnifier"></i>
													<input type="text" class="form-control form-control-solid" placeholder="search...">
												</div>
											</div>
										</div>
									</div>
									<div class="portlet-body">
										<div class="task-content">
											<div class="scroller" style="height: 282px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
												<!-- START TASK LIST -->
												<ul class="task-list">
													<li>
														<div class="task-checkbox">
															<input type="hidden" value="1" name="test"/>
															<input type="checkbox" class="liChild" value="2" name="test"/>
														</div>
														<div class="task-title">
															<span class="task-title-sp">
															Present 2013 Year IPO Statistics at Board Meeting </span>
															<span class="label label-sm label-success">Company</span>
															<span class="task-bell">
															<i class="fa fa-bell-o"></i>
															</span>
														</div>
														<div class="task-config">
															<div class="task-config-btn btn-group">
																<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a href="#">
																		<i class="fa fa-check"></i> Complete </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-pencil"></i> Edit </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-trash-o"></i> Cancel </a>
																	</li>
																</ul>
															</div>
														</div>
													</li>
													<li>
														<div class="task-checkbox">
															<input type="checkbox" class="liChild" value=""/>
														</div>
														<div class="task-title">
															<span class="task-title-sp">
															Hold An Interview for Marketing Manager Position </span>
															<span class="label label-sm label-danger">Marketing</span>
														</div>
														<div class="task-config">
															<div class="task-config-btn btn-group">
																<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a href="#">
																		<i class="fa fa-check"></i> Complete </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-pencil"></i> Edit </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-trash-o"></i> Cancel </a>
																	</li>
																</ul>
															</div>
														</div>
													</li>
													<li>
														<div class="task-checkbox">
															<input type="checkbox" class="liChild" value=""/>
														</div>
														<div class="task-title">
															<span class="task-title-sp">
															AirAsia Intranet System Project Internal Meeting </span>
															<span class="label label-sm label-success">AirAsia</span>
															<span class="task-bell">
															<i class="fa fa-bell-o"></i>
															</span>
														</div>
														<div class="task-config">
															<div class="task-config-btn btn-group">
																<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a href="#">
																		<i class="fa fa-check"></i> Complete </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-pencil"></i> Edit </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-trash-o"></i> Cancel </a>
																	</li>
																</ul>
															</div>
														</div>
													</li>
													<li>
														<div class="task-checkbox">
															<input type="checkbox" class="liChild" value=""/>
														</div>
														<div class="task-title">
															<span class="task-title-sp">
															Technical Management Meeting </span>
															<span class="label label-sm label-warning">Company</span>
														</div>
														<div class="task-config">
															<div class="task-config-btn btn-group">
																<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a href="#">
																		<i class="fa fa-check"></i> Complete </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-pencil"></i> Edit </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-trash-o"></i> Cancel </a>
																	</li>
																</ul>
															</div>
														</div>
													</li>
													<li>
														<div class="task-checkbox">
															<input type="checkbox" class="liChild" value=""/>
														</div>
														<div class="task-title">
															<span class="task-title-sp">
															Kick-off Company CRM Mobile App Development </span>
															<span class="label label-sm label-info">Internal Products</span>
														</div>
														<div class="task-config">
															<div class="task-config-btn btn-group">
																<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a href="#">
																		<i class="fa fa-check"></i> Complete </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-pencil"></i> Edit </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-trash-o"></i> Cancel </a>
																	</li>
																</ul>
															</div>
														</div>
													</li>
													<li>
														<div class="task-checkbox">
															<input type="checkbox" class="liChild" value=""/>
														</div>
														<div class="task-title">
															<span class="task-title-sp">
															Prepare Commercial Offer For SmartVision Website Rewamp </span>
															<span class="label label-sm label-danger">SmartVision</span>
														</div>
														<div class="task-config">
															<div class="task-config-btn btn-group">
																<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a href="#">
																		<i class="fa fa-check"></i> Complete </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-pencil"></i> Edit </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-trash-o"></i> Cancel </a>
																	</li>
																</ul>
															</div>
														</div>
													</li>
													<li>
														<div class="task-checkbox">
															<input type="checkbox" class="liChild" value=""/>
														</div>
														<div class="task-title">
															<span class="task-title-sp">
															Sign-Off The Comercial Agreement With AutoSmart </span>
															<span class="label label-sm label-default">AutoSmart</span>
															<span class="task-bell">
															<i class="fa fa-bell-o"></i>
															</span>
														</div>
														<div class="task-config">
															<div class="task-config-btn btn-group">
																<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a href="#">
																		<i class="fa fa-check"></i> Complete </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-pencil"></i> Edit </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-trash-o"></i> Cancel </a>
																	</li>
																</ul>
															</div>
														</div>
													</li>
													<li>
														<div class="task-checkbox">
															<input type="checkbox" class="liChild" value=""/>
														</div>
														<div class="task-title">
															<span class="task-title-sp">
															Company Staff Meeting </span>
															<span class="label label-sm label-success">Cruise</span>
															<span class="task-bell">
															<i class="fa fa-bell-o"></i>
															</span>
														</div>
														<div class="task-config">
															<div class="task-config-btn btn-group">
																<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a href="#">
																		<i class="fa fa-check"></i> Complete </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-pencil"></i> Edit </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-trash-o"></i> Cancel </a>
																	</li>
																</ul>
															</div>
														</div>
													</li>
													<li class="last-line">
														<div class="task-checkbox">
															<input type="checkbox" class="liChild" value=""/>
														</div>
														<div class="task-title">
															<span class="task-title-sp">
															KeenThemes Investment Discussion </span>
															<span class="label label-sm label-warning">KeenThemes </span>
														</div>
														<div class="task-config">
															<div class="task-config-btn btn-group">
																<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																</a>
																<ul class="dropdown-menu pull-right">
																	<li>
																		<a href="#">
																		<i class="fa fa-check"></i> Complete </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-pencil"></i> Edit </a>
																	</li>
																	<li>
																		<a href="#">
																		<i class="fa fa-trash-o"></i> Cancel </a>
																	</li>
																</ul>
															</div>
														</div>
													</li>
												</ul>
												<!-- END START TASK LIST -->
											</div>
										</div>
										<div class="task-footer">
											<div class="btn-arrow-link pull-right">
												<a href="#">See All Tasks</a>
											</div>
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
 


 
	 
  