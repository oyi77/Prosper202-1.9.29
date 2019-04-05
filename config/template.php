<?php  
ob_start();

function template_top($title = 'Prosper202 ClickServer') { global $navigation; global $version; global $userObj;
	$user_data = get_user_data_feedback($_SESSION['user_id']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>

<title><?php echo $title; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="description" />
<meta name="keywords" content="keywords"/>
<meta name="copyright" content="Prosper202, Inc" />
<meta name="author" content="Prosper202, Inc" />
<meta name="MSSmartTagsPreventParsing" content="TRUE"/>
<meta charset="utf-8"> 
<meta name="robots" content="noindex, nofollow" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="imagetoolbar" content="no"/>
<link rel="shortcut icon" href="<?php echo get_absolute_url();?>assets/img/favicon.gif" type="image/ico"/> 
<!-- Loading Bootstrap -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<!-- Loading Flat UI -->
<link href="<?php echo get_absolute_url();?>assets/css/css/flat-ui-pro.min.css" rel="stylesheet">
<!-- Loading Font Awesome -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<!-- Loading Tags Input CSS -->
<link href="<?php echo get_absolute_url();?>assets/css/css/bootstrap-tokenfield.min.css" rel="stylesheet">
<link href="<?php echo get_absolute_url();?>assets/css/css/tokenfield-typeahead.min.css" rel="stylesheet">
<?php if(($navigation[2] == "setup") AND ($navigation[3] == "aff_campaigns.php")) { ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.22.5/css/jquery.tablesorter.pager.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.22.5/css/theme.bootstrap.min.css" rel="stylesheet">
<?php } ?>
<link href="<?php echo get_absolute_url();?>assets/css/css/select2.css" rel="stylesheet" />
<!-- Loading Custom CSS -->
<link href="<?php echo get_absolute_url();?>assets/css/custom.css" rel="stylesheet">
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
<![endif]-->
<!-- Load JS here -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/fileinput.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/radiocheck.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/bootstrap-tokenfield.min.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/typeahead.bundle.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/tablesort.min.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/iio-rum.min.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/list.min.js"></script>	
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/list.fuzzysearch.min.js"></script>
<?php switch ($navigation[1]) {
	
	case "tracking202": ?>
	<script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
	<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/chart.theme.js"></script>
	<?php if(($navigation[2] == "setup") AND ($navigation[3] == "aff_campaigns.php")) { ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.22.5/js/jquery.tablesorter.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.22.5/js/jquery.tablesorter.widgets.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.22.5/js/extras/jquery.tablesorter.pager.min.js"></script>
	<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/dni.search.offers.tablesorter.php?ddlci=<?php echo $_GET['ddlci'];?>"></script>
	<?php } ?>
	<?php break;

case "account": ?>
<?php if(($navigation[1] == "account") AND !$navigation[2]) { ?>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/home.php"></script>
<?php } ?>

<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/account.php"></script>
<?php break; } ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/custom.php"></script>

</head>
<body>

<!-- START MAIN CONTAINER -->
<div class="container">
<div class="main_wrapper">
	<div class="row">
  		<div class="col-xs-3">
		</div>
  		<div class="col-xs-9">
	  		<nav class="navbar navbar-default" role="navigation">
				<ul class="nav navbar-nav">
					<li <?php if (($navigation[1] == 'account') AND !$navigation[2]) { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>account/" id="HomePage">Home</a></li>			      
				    <li <?php if ($navigation[1] == 'tracking202') { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/" id="ClickServerPage">Prosper202 CS</a></li>
				    <li <?php if ($navigation[1] == 'appstore') { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>appstore/" id="AppStorePage" >App Store <span class="fui-star-2"></span></a> </li> 
				    <li <?php if ($navigation[1] == 'resources') { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>resources/" id="ResourcesPage">How-to Videos</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li id="account-dropdown" class="dropdown <?php if ($navigation[1] == 'account' AND $navigation[2]) { echo 'active'; } ?>">
					    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <?php if($user_data['vip_perks_status']) echo '<span class="label label-important" id="notification">1</span>';?><b class="caret"></b></a>
					    <span class="dropdown-arrow"></span>
					    <ul class="dropdown-menu">
					        <li <?php if ($navigation[2] == 'account.php') { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>account/account.php" id="PersonalSettingsPage">Personal Settings</a></li>
					        <?php if ($userObj->hasPermission("access_to_vip_perks")) { ?><li <?php if ($navigation[2] == 'vip-perks.php') { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>account/vip-perks.php" id="VIPPerksPage">VIP Perks Profile</a> <?php if($user_data['vip_perks_status']) echo '<span class="label label-important" id="notification-perks">1</span>';?></li><?php } ?>
					        <?php if ($userObj->hasPermission("access_to_api_integrations")) { ?><li <?php if ($navigation[2] == 'api-integrations.php') { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>account/api-integrations.php" id="3rdPartyAPIPage">3rd Party API Integrations</a></li><?php } ?>
					        <li <?php if ($navigation[2] == 'conversion-logs.php') { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>account/conversion-logs.php" id="ConversionLogsPage">Conversion Logs</a></li>
					        <?php if ($userObj->hasPermission("add_users")) { ?><li <?php if ($navigation[2] == 'user-management.php') { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>account/user-management.php" id="UserManagementPage">User Management</a></li><?php } ?>
					        <?php if ($userObj->hasPermission("access_to_settings")) { ?><li <?php if ($navigation[2] == 'administration.php') { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>account/administration.php" id="SettingsPage">Settings<span class="fui-gear icon-navbar"></span></a></li><?php } ?>
					        <li <?php if ($navigation[2] == 'help.php') { echo 'class="active";'; } ?>><a href="<?php echo get_absolute_url();?>account/help.php" id="HelpPage">Help<span class="fui-question icon-navbar"></span></a></li>
					    </ul>
					</li>		      
					<li><a href="<?php echo get_absolute_url();?>account/signout.php" id="SignoutPage">Sign Out<span class="fui-exit icon-navbar"></span></a></li>
				</ul>  		      	    
	       	</nav>
  		</div>
	</div>

	<?php if ($navigation[1] == 'tracking202') {  include_once(substr(dirname( __FILE__ ), 0,-10) . '/tracking202/_config/top.php'); } ?>
	<div class="main" <?php if ($navigation[2] == 'setup') { echo 'style="border-top-left-radius:0px;"'; } ?>>

			<?php if ($navigation[1] == 'tracking202') {
				if(($navigation[2] == 'setup') or ($navigation[2] == 'overview') or ($navigation[2] == 'analyze') or ($navigation[2] == 'update')){
					include_once(substr(dirname( __FILE__ ), 0,-10) . '/tracking202/_config/sub-menu.php');
				} 
			} ?>
		
	<?php } function template_bottom() { global $version; 
		$user_data = get_user_data_feedback($_SESSION['user_id']);?>
	</div>
	

	<div style="clear: both;"></div>
	<div class="row footer">
		<div class="col-xs-12">
		Thank you for marketing with <a href="http://prosper202.com" target="_blank">Prosper202</a>
		&middot; 
		<a href="../account/help.php">Help</a>
		&middot; 
		<a href="https://vpsfix.com/tag/prosper202/" target="_blank">Tutorials</a>
		&middot; 
		<a href="https://www.youtube.com/playlist?list=PLW83L64m2zZujbQv7d2dKfK4RUc3-YFvw" target="_blank">How-to Videos</a>
		&middot; 
		<a href="https://vpsfix.com/" target="_blank">Modified by Tharindu</a>
		&middot; 
		
		<?php if ($_SESSION['update_needed'] == true) { ?>
		 	<strong>Your Prosper202 ClickServer <?php echo $version; ?> is out of date. <a href="<?php echo get_absolute_url();?>account/auto-upgrade.php">1-Click Upgrade</a> - <a href="http://my.tracking202.com/clickserver/download/latest/pro" target="_blank">Manual upgrade</a>.</strong>
		 <?php } else { ?>
		 	Your Prosper202 ClickServer <?php echo $version; ?> is up to date.
		 <?php } ?>
		 
		 <br><br>Local time: <?php echo date(DATE_RFC2822); ?>

		 <br><br><a rel="license" href="http://my.tracking202.com/license/" target="_blank">Copyright &copy; <?php echo date("Y") ?> Blue Terra LLC. All rights reserved</a>.
	</div>
	</div>
</div>
</div>

<!-- this is the prosper202 support widget -->
<?php
/* 	if(clickserver_api_key_validate($user_data['api_key'], 'get', 'auth', 'db')){
		$member_status = "Pro";
	} else {
		$member_status = "Not Pro";
	} */
	
	$member_status = "Not Pro";
?>
<!--  intercom.v1.js is saved in js folder -->
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://static.intercomcdn.com/intercom.v1.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}};})()</script>

<?php if (!$user_data['modal_status']) { 
	$data = getSurveyData($user_data['install_hash']);?>

	<script type="text/javascript">
	  $(window).load(function(){
	    $('#survey-modal').modal({
	      backdrop: 'static',
	      show: true,
	  	})
	  });
	</script>
<?php } ?>
<script type="text/javascript">
$(document).ready(function() {			                

  
});
  </script>
</body>
<?php } ?>
