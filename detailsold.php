<?php
$term = 'RTIX';
if (isset($_GET['ticker'])) {
	$term = $_GET['ticker'];
}
$GET_STOCK_URL = "http://bullhornn.com/API/stock_details.php?ticker=" . $term . '&site_name=Sitename.com';
$GET_EVENT_URL = "http://bullhornn.com/API/stock_events.php?ticker=" . $term;
$GET_PRICE_URL = "http://dev.markitondemand.com/Api/v2/Quote/json?symbol=" . $term . "&callback=myFunction";


$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
curl_setopt($ch, CURLOPT_URL, $GET_STOCK_URL);
$stock = curl_exec($ch);
curl_close($ch);
$graph1 = 'http://www.finviz.com/chart.ashx?t='.$term.'&ty=p&ta=0&p=d&s=l';
$events = '';
$ticker_details = '';
$stock_price = array();
if (!empty($stock)) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
	curl_setopt($ch, CURLOPT_URL, $GET_EVENT_URL);
	$events = curl_exec($ch);
	curl_close($ch);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_VERBOSE, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
	curl_setopt($ch, CURLOPT_URL, $GET_PRICE_URL);
	$stock_price = curl_exec($ch);
	curl_close($ch);
	$stock_price = json_decode($stock_price, true);
	
	$compny_name = $stock_price['Name'];
	$priz = $stock_price['LastPrice'];
}
$stock = json_decode($stock, true);
$events = json_decode($events, true);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="../components/font-roboto/roboto.html" rel="import">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <title>Stock details</title>
    <style>
    </style>
</head>
<body style="overflow-x: hidden; margin-top: 90px;">
    <div class="wrapper">
        <div class="nav">
            <div class="container">
                <ul class="pull-left">
                    <li>
                        <a href="index"><img alt="Bullhornn" height="auto" src=
                        "lg1.svg" width="250"></a>
                    </li>
                </ul>
				<ul class="pull-right">
                    <li>
                        <a href="account.html">My Account</a>
                    </li>
					<li>
                        <a href="signup.html">Sign Up</a>
                    </li>
					<li>
                        <a href="login.html">Log In</a>
                    </li>
					<li>
                        <a href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
	</div>
	<div align="center" class="parent">
		<div class="row">
			<div class="col-lg-12">
				<h2><?php echo $compny_name;?> - <?php echo $priz;?></H2>
<!-- <h2>Result for "<?php echo $term;?>"</h2> -->
			</div>
		</div>
		<?php if (!empty($stock)) {?>
			<br/>
			<br/>
			<div class="row">
				<div class="col-lg-1">
				</div>
				<div class="col-lg-6">
					<div class="graph" style="background-image: url('<?php echo @$graph1?>'); width: 663px; background-repeat: no-repeat; background-size: cover; height: 328px;">
					</div>
				</div>
				<div class="col-lg-5">
					<h4>Business Summery</h4>
					<p style="padding: 0 26px 0 43px; text-align: justify; white-space: normal;">
						<?php echo @$stock['Profile']?>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<h2>Financial Summary for <?php echo $compny_name;?></h2>
				</div>
				<div class="col-lg-12" style="padding: 40px; text-align: center;">
					<table class="table table-hover">
						<tbody><?php 
							if (!empty($stock['Stock'])) {
								foreach ($stock['Stock'] as $value) {
									echo '<tr>';
									echo '<td>' . $value[0] . '</td>';
									echo '<td>' . $value[1] . '</td>';
									echo '<td>' . $value[2] . '</td>';
									echo '<td>' . $value[3] . '</td>';
									echo '<td>' . $value[4] . '</td>';
									echo '<td>' . $value[5] . '</td>';
									echo '<td>' . $value[6] . '</td>';
									echo '<td>' . $value[7] . '</td>';
									echo '<td>' . $value[8] . '</td>';
									echo '<td>' . $value[9] . '</td>';
									echo '<td>' . $value[10] . '</td>';
									echo '<td>' . $value[11] . '</td>';
									echo '</tr>';
								}
							}
							?>
						</tbody>
					</table>
				</div>	
			</div>	
			<div class="row">
				<div class="col-lg-2">
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color:white;">
							<h3 class="panel-title"><div class="h2 strong">Recent News</div></h3>
						</div>
						<div class="panel-body">
							<div id="content">
								<ul style="margin-left: -11px; overflow-y: scroll; height: 291px;">
								<?php
								if (empty($stock['News'])) {
									echo '<li></li>';
								}
								else {
									foreach ($stock['News'] as $news) {
										echo '<li><a href='.$news['link'].'">'.$news['news'].'</a><div style="clear:both"></div></li>';
									}
								}								
								?>
								<ul>
							</div>
						</div>
					</div>
				</div> 
				<div class="col-md-4"> 
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color:white;">
							<h3 class="panel-title">
								<div class="h2 strong">Key Events</div>
							</h3>
						</div>
						<div class="panel-body">
							<div id="content">
								<ul style="margin-left: -11px; overflow-y: scroll; height: 291px;">
								<?php
								if (empty($events['Events'])) {
									echo '<li></li>';
								}
								else {
									foreach ($events['Events'] as $news) {
										if (empty($news['event'])) {
											continue;
										}
										echo '<li><a href='.$news['link'].'">'.$news['date']. ' - ' .$news['event'].'</a><div style="clear:both"></div></li>';
									}
								}								
								?>
								<ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color:white;">
							<h3 class="panel-title">
								<div class="h2 strong">Management Actions</div>
							</h3>
						</div>
						<div class="panel-body">
							<div id="content"></div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-2">
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color:white;">
							<h3 class="panel-title"><div class="h2 strong">Shareholder Returns</div></h3>
						</div>
						<div class="panel-body">
							<div id="content"></div>
						</div>
					</div>
				</div> 
				<div class="col-md-4"> 
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color:white;">
							<h3 class="panel-title">
								<div class="h2 strong">Capital Deployment</div>
							</h3>
						</div>
						<div class="panel-body">
							<div id="content"></div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color:white;">
							<h3 class="panel-title">
								<div class="h2 strong">Corporate Governance</div>
							</h3>
						</div>
						<div class="panel-body">
							<div id="content"></div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-2">
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color:white;">
							<h3 class="panel-title"><div class="h2 strong">Action Risk Score</div></h3>
						</div>
						<div class="panel-body">
							<div id="content"></div>
						</div>
					</div>
				</div> 
				<div class="col-md-4"> 
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color:white;">
							<h3 class="panel-title">
								<div class="h2 strong">Discussions</div>
							</h3>
						</div>
						<div class="panel-body">
							<div id="content"></div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading" style="background-color:white;">
							<h3 class="panel-title">
								<div class="h2 strong">Proposal</div>
							</h3>
						</div>
						<div class="panel-body">
							<div id="content"></div>
						</div>
					</div>
				</div>
			</div>
		<?php }
		else {?>
			<br/>
					<br/><br/>
					<br/>
				<p class="bg-danger">
					<br/>
					Please submit correct ticker.
					<br/>
					<br/>
				</p>
				<br/>
					<br/><br/>
					<br/>
		<?php }?>
	</div>
	
	<div class="fcontainer">
		<div class="footer">
			<div class="footl">
				<h5>Company</h5>
				<ul class="foot">
					<li><a href="#">About</a></li>
					<li><a href="#">Jobs</a></li>
					<li><a href="#">Press</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Help</a></li>
					<li><a href="#">Policies</a></li>
					<li><a href="#">Terms &amp; Privacy</a></li>
				</ul>
			</div>
			<div class="footr">
				<h5>Discover</h5>
				<ul class="Footer2">
					<li><a href="#">Invite Friends</a></li>
					<li><a href="#">Mobile</a></li>
					<li><a href="#">Site Map</a></li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>