<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php include_once '../include/connection.php'; ?>
<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>RAR Admin Dashboard</title>
        <!-- style css php -->
        <?php include_once 'css_style/style.php';?>
		<!-- end style css php -->
	<body>
		<div id="wrapper">
            <!-- nav -->
            <?php include_once 'sidebar/nav_dashboard.php';?>
			<!-- end nav -->
			<div id="page-wrapper" class="gray-bg dashbard-1">
                <!-- navbar -->
                <?php include_once 'sidebar/navbar.php';?>
                <!-- end navbar -->
				<div class="wrapper wrapper-content">
					<div class="row">
						<div class="col-lg-3">
							<div class="ibox ">
								<div class="ibox-title"> <span class="label label-success float-right">Hostel Booked</span>
									<h5> Number of Booked Hostels</h5> </div>
								<div class="ibox-content">

								<?php
										$ret=mysqli_query($con,"select SUM(sum) AS sum FROM reservation ");
										$num=mysqli_num_rows($ret);
											if($num>0)
											{
										while ($row=mysqli_fetch_array($ret)) {

										?>
									<h1 class="no-margins"><?php echo $row['sum'];  ?></h1>

									<?php } } else{ ?>
										
										<h1 class="no-margins">000</h1>
									<?php } ?>
									  
									</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="ibox ">
								<div class="ibox-title"> <span class="label label-info float-right">Assist</span>
									<h5>Booking Assist</h5> </div>
								<div class="ibox-content">
								<?php
										$ret=mysqli_query($con,"select SUM(sum) AS sum FROM booking_assist ");
										$num=mysqli_num_rows($ret);
											if($num>0)
											{
										while ($row=mysqli_fetch_array($ret)) {

										?>
									<h1 class="no-margins"><?php echo $row['sum'];  ?></h1>

									<?php } } else{ ?>
										
										<h1 class="no-margins">000</h1>
									<?php } ?>
									</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="ibox ">
								<div class="ibox-title"> <span class="label label-primary float-right">Landlords</span>
									<h5>Available Hostels</h5> </div>
								<div class="ibox-content">
								<?php
										$ret=mysqli_query($con,"select SUM(sum) AS sum FROM accommodation where status='Approved' ");
										$num=mysqli_num_rows($ret);
											if($num>0)
											{
										while ($row=mysqli_fetch_array($ret)) {

										?>
									<h1 class="no-margins"><?php echo $row['sum'];  ?></h1>

									<?php } } else{ ?>
										
										<h1 class="no-margins">000</h1>
									<?php } ?>
									<div class="stat-percent font-bold text-navy">% <i class="fa fa-level-up"></i></div> <small>Hostels</small> </div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="ibox ">
								<div class="ibox-title"> <span class="label label-danger float-right">Pending</span>
									<h5>Pending Landlords</h5> </div>
								<div class="ibox-content">
								<?php
										$ret=mysqli_query($con,"select SUM(sum) AS sum FROM accommodation where status='Pending' ");
										$num=mysqli_num_rows($ret);
											if($num>0)
											{
										while ($row=mysqli_fetch_array($ret)) {

										?>
									<h1 class="no-margins"><?php echo $row['sum'];  ?></h1>

									<?php } } else{ ?>
										
										<h1 class="no-margins">000</h1>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="ibox ">
								<div class="ibox-title">
									<h5>Orders</h5>
									<div class="float-right">
										<div class="btn-group">
										
										</div>
									</div>
								</div>
								<div class="ibox-content">
									<div class="row">
										<div class="col-lg-9">
											<div class="flot-chart">
												<div class="flot-chart-content" id="flot-dashboard-chart"></div>
											</div>
										</div>
										<div class="col-lg-3">
											<ul class="stat-list">
												<li>
												<?php
										$ret=mysqli_query($con,"select SUM(sum) AS sum FROM reservation ");
										$num=mysqli_num_rows($ret);
											if($num>0)
											{
										while ($row=mysqli_fetch_array($ret)) {

										?>
									<h2 class="no-margins"><?php echo $row['sum'];  ?></h2>

									<?php } } else{ ?>
										
										<h2 class="no-margins">0000</h2>
									<?php } ?>

												
													
													<small>Total ordered Hostels</small>
													<div class="stat-percent"> <i class="fa fa-level-up text-navy"></i></div>
													<div class="progress progress-mini">
														<div style="width: 100%;" class="progress-bar"></div>
													</div>
												</li>
												<li>
												<?php
										$ret=mysqli_query($con,"select SUM(sum) AS sum FROM accommodation ");
										$num=mysqli_num_rows($ret);
											if($num>0)
											{
										while ($row=mysqli_fetch_array($ret)) {

										?>
									<h2 class="no-margins"><?php echo $row['sum'];  ?></h2>

									<?php } } else{ ?>
										
										<h2 class="no-margins">0000</h2>
									<?php } ?>
													
													<small>Total Hostels (Pending and Available)</small>
													<div class="stat-percent">  <i class="fa fa-level-down text-navy"></i></div>
													<div class="progress progress-mini">
														<div style="width: 100%;" class="progress-bar"></div>
													</div>
												</li>
												<li>

														<?php
										$ret=mysqli_query($con,"select SUM(sum) AS sum FROM accommodation where status='Approved' ");
										$num=mysqli_num_rows($ret);
											if($num>0)
											{
										while ($row=mysqli_fetch_array($ret)) {

										?>
									<h2 class="no-margins"><?php echo $row['sum'];  ?></h2>

									<?php } } else{ ?>
										
										<h2 class="no-margins">0000</h2>
									<?php } ?>
													
													<small>Approved Landlords</small>
													<div class="stat-percent">  <i class="fa fa-bolt text-navy"></i></div>
													<div class="progress progress-mini">
														<div style="width: 100%;" class="progress-bar"></div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="ibox ">
								<div class="ibox-title">
									<h5>Recent Booked</h5>
									<div class="ibox-tools">
										<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
										<a class="close-link"> <i class="fa fa-times"></i> </a>
									</div>
								</div>
								<div class="ibox-content ibox-heading">
									<h3><i class="fa fa-envelope-o"></i> New Booked</h3> <small><i class="fa fa-tim"></i> You have new Booked and they are waiting for action.</small> </div>
								<div class="ibox-content">
									<div class="feed-activity-list">

									<?php
                        include('../include/connection.php');

                        $ret=mysqli_query($con,"select * from reservation ORDER by ID desc
                        LIMIT 5");
                        while ($row=mysqli_fetch_array($ret)) 
                        {
                        ?>
										<div class="feed-element">
											<div> <small class="float-right text-navy"><?= $row['DateCreated'] ;?></small> <strong><?= $row['surname'] ;?>, <?= $row['firstname'] ;?></strong>
												<div><?= $row['accommodation'] ;?> at <?= $row['university'] ;?></div> 
												<small class="text-muted">Entering <?= $row['eta'] ;?> staying for <?= $row['duration'] ;?></small> </div>
										</div>


								<?php }?>



									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="row">
								<div class="col-lg-6">
									<div class="ibox ">
										<div class="ibox-title">
											<h5>Landlord Hostel Listing</h5>
											<div class="ibox-tools">
												<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
												<a class="close-link"> <i class="fa fa-times"></i> </a>
											</div>
										</div>
										<div class="ibox-content table-responsive">
											<table class="table table-hover no-margins">
												<thead>
													<tr>
														<th>Status</th>
														<th>Date</th>
														<th>Landlord</th>
														<th>Location</th>
													</tr>
												</thead>
												<tbody>

												<?php
                        include('../include/connection.php');

                        $ret=mysqli_query($con,"select * from accommodation ORDER by ID desc
                        LIMIT 5");
                        while ($row=mysqli_fetch_array($ret)) 
                        {
                        ?>

													<tr>
														<td><small><span class="label label-primary"><?= $row['status'] ;?></span> </small></td>
														<td><i class="fa fa-clock-o"></i> <?= $row['dateCreated'] ;?></td>
														<td><?= $row['surname'] ;?>, <?= $row['fname'] ;?></td>
														<td class="text-navy"> <i class="fa fa-level-up"></i> <?= $row['university'] ;?> </td>
													</tr>


													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="ibox ">
										<div class="ibox-title">
											<h5>Assist Booking</h5>
											<div class="ibox-tools">
												<a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
												<a class="close-link"> <i class="fa fa-times"></i> </a>
											</div>
										</div>
										<div class="ibox-content">
											<ul class="todo-list m-t small-list">
										
										
										<?php
                        include('../include/connection.php');

                        $ret=mysqli_query($con,"select * from booking_assist ORDER by ID desc
                        LIMIT 5");
                        while ($row=mysqli_fetch_array($ret)) 
                        {
                        ?>
												<li> <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a> 
												<span class="m-l-xs"><?= $row['fullname'] ;?> | <?= $row['university'] ;?> | <?= $row['country'] ;?></span> </li>
											
												
												<?php } ?>
						</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <!-- footer -->
                <?php include_once 'footer/footer.php';?>
				<!-- end footer -->
			</div>
            
		</div>
        <!-- <script> js php import</script> -->
        <?php include_once 'script/js.php';?>
		<!-- <script> import</script> -->
	</body>
</html>