<?php include('function.php');
include("config.php");
?>

<?php 
$all_user="SELECT `id` from `users` where `flag` = '0'";
$fet=mysql_query($all_user);
$all_user=mysql_num_rows($fet);
?>

<?php 
$all_posts="SELECT `id` from `posts` order by id Asc ";
$fet_posts=mysql_query($all_posts);
$all_posts=mysql_num_rows($fet_posts);
?>

<?php 
$all_likes="SELECT `id` from `posts` order by id Asc ";
$fet_likes=mysql_query($all_likes);
$all_likes=mysql_num_rows($fet_likes);
?>

<?php 
$all_followers="SELECT `id` from `followers` order by id Asc ";
$fet_followers=mysql_query($all_followers);
$all_followers=mysql_num_rows($fet_followers);
?>


<?php head();?>

<?php contain_start();?>
<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-group"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $all_user; ?>
							</div>
							<div class="desc">
									User
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $all_posts; ?>
							</div>
							<div class="desc">
								posts
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-thumbs-up"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php echo $all_likes;?>
							</div>
							<div class="desc">
								Like
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
							<?php echo $all_followers;?>
							</div>
							<div class="desc">
								Followers
							</div>
						</div>
						<a class="more" href="#">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
<?php footer();?>

