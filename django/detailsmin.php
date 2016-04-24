<?php
	$term='RTIX';

	if(isset($_GET['ticker'])){
		$term=$_GET['ticker'];
	}
$ticker= $_GET['ticker'];
$ticker=strtoupper($ticker);
	$GET_STOCK_URL="http://bullhornn.com/API/stock_details.php?ticker=".$term.'&site_name=bullhornn.com';
	$GET_EVENT_URL="http://bullhornn.com/API/stock_events.php?ticker=".$term;
	$GET_PRICE_URL="http://dev.markitondemand.com/Api/v2/Quote/json?symbol=".$term."&callback=myFunction";
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_VERBOSE,0);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/4.0 (compatible;)");
	curl_setopt($ch,CURLOPT_URL,$GET_STOCK_URL);
	$stock=curl_exec($ch);
	curl_close($ch);
	$graph1='http://www.finviz.com/chart.ashx?t='.$term.'&ty=p&ta=0&p=d&s=l';
	$events='';
	$ticker_details='';
	$stock_price=array();

	if(!empty($stock)){
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch,CURLOPT_VERBOSE,0);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/4.0 (compatible;)");
		curl_setopt($ch,CURLOPT_URL,$GET_EVENT_URL);
		$events=curl_exec($ch);
		curl_close($ch);
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch,CURLOPT_VERBOSE,0);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/4.0 (compatible;)");
		curl_setopt($ch,CURLOPT_URL,$GET_PRICE_URL);
		$stock_price=curl_exec($ch);
		curl_close($ch);
		$stock_price=json_decode($stock_price,true);
		$compny_name=$stock_price['Name'];
	}

	$stock=json_decode($stock,true);
	$events=json_decode($events,true);


	?>



	<!DOCTYPE html>
	<html>
	  <head>
	    <meta charset="utf-8">
	    <meta name=viewport content="width=device-width, initial-scale=1, user-scalable=no">
	    <meta name="theme-color" content="#C8C8C8">
	    <link rel="icon" sizes="192x192" href="apple-touch-icon.png">
	    <meta name="apple-mobile-web-app-title" content="Bullhornn">
	    <link rel="apple-touch-icon" href="apple-touch-icon.png" />
	    <meta name="mobile-web-app-capable" content="yes">
	    <title>Bullhornn</title>
	    <!-- Compiled and minified CSS -->
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
	    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



	    <!-- Compiled and minified JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>

	<script>
	  $( document ).ready(function(){$(".button-collapse").sideNav();})
	  </script>

	  <style>
	  nav a {
	    color: black!important;
	}
	nav {
	    color: black;
	    background-color: #FFF;
	    /*rgb(249, 249, 249);*/

	}


	.main{
	      margin-top: -25px;
	}

	@media only screen and (max-width: 768px) {
	    html{
	      overflow-x: hidden;
	  }

	}

	.container {
	    text-align: center;
	    margin-top: -25px;
	    color: white;
	    padding-top: 20%;
	}
	.card-panel{

	    height: 400px;
	    width: 300px;

	}
	.card-panel h5{
	  margin-top: -8px;
	font-weight: bold;
	}
	.col{
	  display: inline-block;
	  padding: 18px;
	  float: left;
	  height: 400px;
	  margin-bottom: 50px;
	  text-align: left;
	}



	</style>
	  </head>
	  <body>

	  <nav>
	    <div class="nav-wrapper">
	      <a href="index.html" class="brand-logo"><img style="border: 0;height: 60px;width: auto;padding: 5px; padding-left: 20px;" src="lg1.svg" /></a>
	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons" style="padding-left: 20px; ">menu</i>
	      <ul class="right hide-on-med-and-down">
	        <li><a href="account.html">My Account</a></li>
	        <li><a href="signup.html">Sign Up</a></li>
	        <li><a href="login.html">Login</a></li>
	        <li><a href="help.html">Help</a></li>
	      </ul>
	      <ul class="side-nav" id="mobile-demo">
	        <li><a href="account.html">My Account</a></li>
	        <li><a href="signup.html">Sign Up</a></li>
	        <li><a href="login.html">Login</a></li>
	        <li><a href="help.html">Help</a></li>
	      </ul>
	    </div>
	  </nav>

        </div>
        <div align="center" class="parent">
            <div class="row">
                <div class="col-lg-12">
                    <h2><?php echo $ticker?> - <?php echo $stock['Stock'][11][12];?></H2> </div>
            </div>
            <?php if(!empty($stock)){?>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-lg-1"> </div>
                    <div class="col-lg-6">
                        <div class="graph" style="background-image:url('<?php echo @$graph1?>');width:663px;background-repeat:no-repeat;background-size:cover;height:328px"> </div>
                    </div>
                    <div class="col-lg-5">
                        <h4>Business Summery</h4>
                        <p style="padding:0 26px 0 43px;text-align:justify;white-space:normal">
                            <?php echo @$stock['Profile']?>
                        </p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <h2>Financial Summary for <?php echo $ticker;?></h2> </div>
                    <div class="col-lg-12" style="padding:40px;text-align:center">
                        <table class="table table-hover">
                            <tbody>
                                <?php if(!empty($stock['Stock'])){foreach($stock['Stock'] as $value){echo '<tr>';echo '<td>'.$value[0].'</td>';echo '<td>'.$value[1].'</td>';echo '<td>'.$value[2].'</td>';echo '<td>'.$value[3].'</td>';echo '<td>'.$value[4].'</td>';echo '<td>'.$value[5].'</td>';echo '<td>'.$value[6].'</td>';echo '<td>'.$value[7].'</td>';echo '<td>'.$value[8].'</td>';echo '<td>'.$value[9].'</td>';echo '<td>'.$value[10].'</td>';echo '<td>'.$value[11].'</td>';echo '</tr>';}}?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div align="center" class="containe">
                    <div class="row" style="margin-left:0;margin-right:0">
                        <div class="col-lg-2">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color:white">
                                    <h3 class="panel-title"><div class="h2 strong">Recent News</div></h3> </div>
                                <div class="panel-body">
                                    <div id="content">
                                        <ul style="margin-left:-11px;overflow-y:scroll;height:291px">
                                            <?php if(empty($stock['News'])){echo '<li></li>';}else{foreach($stock['News'] as $news){echo '<li><a href='.$news['link'].'">'.$news['news'].'</a><div style="clear:both"></div></li>';}}?>
                                                <ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color:white">
                                    <h3 class="panel-title"> <div class="h2 strong">Key Events</div> </h3> </div>
                                <div class="panel-body">
                                    <div id="content">
                                        <ul style="margin-left:-11px;overflow-y:scroll;height:291px">
                                            <?php if(empty($events['Events'])){echo '<li></li>';}else{foreach($events['Events'] as $news){if(empty($news['event'])){continue;}echo '<li><a href='.$news['link'].'">'.$news['date'].' - '.$news['event'].'</a><div style="clear:both"></div></li>';}}?>
                                                <ul>
                                    </div>
                                </div>
                            </div>
                        </div>







                        <div class="pans" style="margin-left: 20px;">
													<div align="center" class="col ">
									          <div class="card-panel ">
									            <h5 align="center">Management Actions</h5>
									            <span class="black-text">Nothing to show you here..</span>
									          </div>
									        </div>
													<div align="center" class="col ">
														<div class="card-panel ">
															<h5 align="center">Shareholder Returns</h5>
															<span class="black-text">Nothing to show you here..</span>
														</div>
													</div>
														<div align="center" class="col ">
															<div class="card-panel ">
																<h5 align="center">Capital Deployment</h5>
																<span class="black-text">Nothing to show you here..</span>
															</div>
														</div>
														<div align="center" class="col ">
															<div class="card-panel ">
																<h5 align="center">Corporate Governance</h5>
																<span class="black-text">Nothing to show you here..</span>
															</div>
														</div>
														<div align="center" class="col ">
															<div class="card-panel ">
																<h5 align="center">Action Risk Score</h5>
																<span class="black-text">Nothing to show you here..</span>
															</div>
														</div>
														<div align="center" class="col ">
															<div class="card-panel ">
																<h5 align="center">Discussions</h5>
																<span class="black-text">Nothing to show you here..</span>
															</div>
														</div>
														<div align="center" class="col ">
															<div class="card-panel ">
																<h5 align="center">Proposals</h5>
																<span class="black-text">Nothing to show you here..</span>
															</div>
														</div>


												</div>
                    </div>
                </div>
                <?php }else{?>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <p class="bg-danger">
                        <br/> Please submit correct ticker.
                        <br/>
                        <br/> </p>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <?php }?>
        </div>
				<style>@media only screen and (min-width: 768px){img.footer-logos{width:8%}}@media only screen and (max-width: 768px){img.footer-logos{width:15%}}  .site-footer{color:#888;background-color:#111;padding-bottom:2px}.site-footer a{color:#ccc}.site-footer a:focus,.site-footer a:hover{color:#fff}.site-footer .footer-logo{padding:80px 0 30px;text-align:center}.site-footer .footer-widgets{padding:80px 0;background-color:#141414}.site-footer .footer-widgets .widget-title{color:#fff;text-transform:uppercase}.site-footer .footer-bottom{text-align:center}.site-footer .footer-bottom .footer-text{padding:0 0 30px}.col-md-12,.cscontainer{padding-left:15px;padding-right:15px}.site-footer .footer-bottom .social-list ul{display:inline-block;background-color:#000}.site-footer .footer-bottom .social-list a{width:44px;height:44px;line-height:44px}.site-footer .footer-bottom .social-list a:hover{background-color:#458f2f}.site-footer .footer-bottom:first-child .footer-text,.site-footer .footer-widgets+.footer-bottom .footer-text{padding-top:30px}.cscontainer{margin-right:auto;margin-left:auto}@media (min-width:768px){.cscontainer{width:750px}}@media (min-width:992px){.cscontainer{width:970px}}@media (min-width:1200px){.cscontainer{width:1170px}}.col-md-12{position:relative;min-height:1px}@media (min-width:992px){.col-md-12{float:left;width:100%}}
			  </style>
			 <footer class="site-footer"> <div class="footer-logo"> <div class="cscontainer"> <div class="row"> <div class="col-md-12"> <a href="index.html"><img class="circle footer-logos" src="apple-touch-icon.png"></a></div></div></div></div><div class="footer-bottom"> <div class="cscontainer"> <div class="row"> <div class="col-md-12"> <div class="footer-text"> Copyright © 2015. <a href="index.html">Next Generation Therapeutics LLC. </a>. All Rights Reserved. </div></div></div><p style="margin-bottom:2px;margin-right:-10px;font-size:xx-small">* CONTENT DISCLAIMER: ALL INFORMATION PROVIDED ON NEXT GENERATION THERAPEUTICS LLC WEBSITES ARE PROVIDED FOR INFORMATION PURPOSES ONLY. INFORMATION ON OFFICIAL NEXT GENERATION THERAPEUTICS LLC WEBSITES IS SUBJECT TO CHANGE WITHOUT PRIOR NOTICE. ALTHOUGH EVERY REASONABLE EFFORT IS MADE TO PRESENT CURRENT AND ACCURATE INFORMATION, NEXT GENERATION THERAPEUTICS LLC MAKES NO GUARANTEES OF ANY KIND. IN NO EVENT SHALL NEXT GENERATION THERAPEUTICS LLC BE LIABLE FOR ANY DIRECT, INDIRECT, SPECIAL OR INCIDENTAL DAMAGE RESULTING FROM, ARISING OUT OF OR IN CONNECTION WITH THE USE OF THE INFORMATION FROM THE SITE </p></div></div></footer>

    </body>

    </html>
