
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
						<a class="more" href="user_list.php">
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
						<a class="more" href="post_details.php">
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
						<a class="more" href="followers.php">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Category Wise Post Report
							</div>
							 
						</div>
						<div class="portlet-body">
							<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>		 
						</div>
					</div>										
			
<?php footer();?>
<?php
$count_post_arrayall=array();
$cate=mysql_query("select * from `templete_categories` ORDER BY ID ASC" );
$y=0;
 while($ave_cate=mysql_fetch_array($cate)) 
{
 $count_post_array=array();
$t_id=$ave_cate['id'];


 	$total_month=12;
    $currnt_year=date('Y');
    for($x=1;$x<=$total_month;$x++)
    {
     $total_month_leave=0;
     $total_month_absent=0;
     $total_month_prsent=0;
     $total_month_working=0;
     $total_month_holiday=0;
     
     $first_date='01-'.$x.'-'.$currnt_year;
     $first_date=date('Y-m-d',strtotime($first_date));
     $last_date=date('Y-m-t',strtotime($first_date));
 	 $set=mysql_query("select `id` from `posts` where `templet_id`='$t_id' && `created_on` BETWEEN '$first_date' AND '$last_date'"); 
 	 $count_post_array[]=mysql_num_rows($set);
	 
	}
	$count_post_arrayall[$y]=$count_post_array;
 	
	$y++;
}
$condolance=$count_post_arrayall[0]; 
 $condolanceArray=implode(', ',$condolance);
$congratulations=$count_post_arrayall[1]; 
 $congratulationsArray=implode(', ',$congratulations);
$invitation=$count_post_arrayall[2]; 
 $invitationArray=implode(', ',$invitation);

 ?>

 
<style type="text/css">
	${demo.css}
</style>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Category Wise Post'
        },
         
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'POST'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Condolence',
            data: [<?php echo $condolanceArray; ?>]

        }, {
            name: 'Congratulationss',
            data: [<?php echo $congratulationsArray; ?>]

        }, {
            name: 'Invitation',
            data: [<?php echo $invitationArray?>]

        }]
    });
});
</script>
<script src="js/highcharts.js"></script>
