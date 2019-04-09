<?php 
// function get_absolute_url(){
//     return '';
// } 

ob_start();

function template_top($title = 'Bakul Telo CPA Tracker') { global $navigation; global $version; global $userObj;
    ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> <?= $title ?> </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="<?= get_absolute_url() ?>assets/css/vendor.css">
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="<?= get_absolute_url() ?>assets/css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="<?= get_absolute_url() ?>assets/css/app.css">');
            }
        </script>

    <link href="<?php echo get_absolute_url();?>assets/css/css/bootstrap.min.css" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="<?php echo get_absolute_url();?>assets/css/css/flat-ui-pro.min.css" rel="stylesheet">
    <!-- Loading Font Awesome -->
    <link href="<?php echo get_absolute_url();?>assets/css/css/font-awesome.min.css" rel="stylesheet">
    <!-- Loading Tags Input CSS -->
    <link href="<?php echo get_absolute_url();?>assets/css/css/bootstrap-tokenfield.min.css" rel="stylesheet">
    <link href="<?php echo get_absolute_url();?>assets/css/css/tokenfield-typeahead.min.css" rel="stylesheet">
    <?php if(($navigation[2] == "setup") AND ($navigation[3] == "aff_campaigns.php")) { ?>
    <link href="https://dp5k1x6z3k332.cloudfront.net/jquery.tablesorter.pager.min.css" rel="stylesheet">
    <link href="https://dp5k1x6z3k332.cloudfront.net/theme.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php } ?>
    <link href="<?php echo get_absolute_url();?>assets/css/css/select2.css" rel="stylesheet" />
    <!-- Loading Custom CSS -->
    <link href="<?php echo get_absolute_url();?>assets/css/custom.css" rel="stylesheet">

    <!-- <script type="text/javascript" src="https://dp5k1x6z3k332.cloudfront.net/jquery-1.11.2.min.js"></script> -->

         <script src="<?= get_absolute_url() ?>assets/js/vendor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/tablesort.min.js"></script>

<script type="text/javascript" src="https://dp5k1x6z3k332.cloudfront.net/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://dp5k1x6z3k332.cloudfront.net/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/radiocheck.js"></script>
    <script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/custom.php"></script>

    <?php switch ($navigation[1]) {
        
        case "tracking202": ?>  
        <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/chart.theme2.js"></script>
        <?php if(($navigation[2] == "setup") AND ($navigation[3] == "aff_campaigns.php")) { ?>
        <script type="text/javascript" src="https://dp5k1x6z3k332.cloudfront.net/jquery.tablesorter.min.js"></script>
        <script type="text/javascript" src="https://dp5k1x6z3k332.cloudfront.net/jquery.tablesorter.widgets.js"></script>
        <script type="text/javascript" src="https://dp5k1x6z3k332.cloudfront.net/jquery.tablesorter.pager.min.js"></script>
        <script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/dni.search.offers.tablesorter.php?ddlci=<?php echo $_GET['ddlci'];?>"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <?php } ?>
        <?php if(($navigation[2] == "setup") AND ($navigation[3] == "ads.php")) { ?>
        <script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/dropzone.js"></script>
        <?php } ?>
        <?php break;

    case "account": ?>
    <?php if(($navigation[1] == "account") AND !$navigation[2]) { ?>
    <script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/home.php"></script>
    <?php } ?>

    <script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/account.php"></script>
    <?php break; } ?>
</head>
    <body>
        <div class="main-wrapper">
            <div class="app" id="app">
                <header class="header">
                    <div class="header-block header-block-collapse d-lg-none d-xl-none">
                        <button class="collapse-btn" id="sidebar-collapse-btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="header-block header-block-search">
                        <form role="search">
                            <div class="input-container">
                                <i class="fa fa-search"></i>
                                <input type="search" placeholder="Search">
                                <div class="underline"></div>
                            </div>
                        </form>
                    </div>
                    <div class="header-block header-block-nav">
                        <ul class="nav-profile">
                            <li class="notifications new">
                                <a href="" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <sup>
                                        <span class="counter"></span>
                                    </sup>
                                </a>
                                <div class="dropdown-menu notifications-dropdown-menu">
                                    <ul class="notifications-container">
                                        <?php

                                        if ($userObj->hasPermission("access_to_setup_section")) {
                                            $user_sql = "SELECT user_fname,user_lname,user_name,user_id,user_email,user_time_register,user_timezone,install_hash,user_hash,role_name FROM 202_users LEFT JOIN 202_user_role USING (user_id) LEFT JOIN 202_roles USING (role_id) WHERE user_id!=1 and user_deleted!=1 and user_active!=1";
                                            $user_result = _mysqli_query($user_sql);
                                            if ($user_result ->num_rows == 0 ) {
                                        ?>
                                        <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                        <div class="img"><i class="fa fa-ban"></i></div>
                                                    </div>
                                                    <div class="body-col">
                                                        <p>
                                                            <span class="accent">No Users </span> Register. </p>
                                                </div>
                                            </a>
                                        </li>
                                            <?php } else {
                                                while ($user_row = $user_result ->fetch_array(MYSQLI_ASSOC)) {
                                                    $html['user_display_name'] = '';
                                                    if($user_row['user_fname']){
                                                        $html['user_display_name'] = htmlentities($user_row['user_fname'], ENT_QUOTES, 'UTF-8');
                                                        if($user_row['user_lname']){
                                                            $html['user_display_name'] .= " ".htmlentities($user_row['user_lname'], ENT_QUOTES, 'UTF-8'). " (".$user_row['role_name'].")";
                                                        }
                                                     }
                                                     else{
                                                         $html['user_display_name'] = " ".$user_row['user_name']. " (".$user_row['role_name'].")";
                                                     }
                                                ?>
                                                    <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img" style="background-image: url('<?= get_absolute_url() ?>assets/faces/3.jpg')"></div>
                                                </div>
                                                <div class="body-col">
                                                    <p>
                                                        <span class="accent">System</span> message:
                                                        <span class="accent"><?=  $html['user_display_name'] ?></span> Register. </p>
                                                </div>
                                            </a>
                                        </li>
                                                <?php
                                                }
                                            }
                                     } else { ?>
                                            <li>
                                            <a href="" class="notification-item">
                                                <div class="img-col">
                                                    <div class="img"><i class="fa fa-home"></i></div>
                                                </div>
                                                <div class="body-col">
                                                    <p>
                                                        <span class="accent">Admin</span>:
                                                        <span class="accent">Welcome To Our Network!</span>. </p>
                                                </div>
                                            </a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <footer>
                                        <ul>
                                            <li>
                                                <a href="<?= get_absolute_url() ?>account/user-management.php"> View All </a>
                                            </li>
                                        </ul>
                                    </footer>
                                </div>
                            </li>
                            <li class="profile dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <div class="img" style="background-image: url('https://avatars3.githubusercontent.com/u/3959008?v=3&s=40')"> </div>
                                    <span class="name"> <?= ucwords($_SESSION["user_name"]) ?> </span>
                                </a>
                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="<?php echo get_absolute_url();?>account/account.php">
                                        <i class="fa fa-user icon"></i> Profile </a>
                                     <?php if ($userObj->hasPermission("add_users")) { ?><a class="dropdown-item" href="<?php echo get_absolute_url();?>account/user-management.php">
                                        <i class="fa fa-bell icon"></i> User Management </a><?php } ?>
                                    <?php if ($userObj->hasPermission("access_to_settings")) { ?><a class="dropdown-item" href="<?php echo get_absolute_url();?>account/administration.php" id="SettingsPage"><i class="fa fa-gear icon"></i> Settings</a><?php } ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo get_absolute_url();?>account/signout.php" id="SignoutPage">
                                        <i class="fa fa-power-off icon"></i> Logout </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </header>
                <aside class="sidebar">
                    <div class="sidebar-container">
                        <div class="sidebar-header">
                            <div class="brand">
                                <div class="logo">
                                    <span class="l l1"></span>
                                    <span class="l l2"></span>
                                    <span class="l l3"></span>
                                    <span class="l l4"></span>
                                    <span class="l l5"></span>
                                </div> BakulTelo Tracker</div>
                        </div>
                        <nav class="menu">
                            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                                <li <?php if ((($navigation[1] == 'account' and !$navigation[2]) or $navigation[2] == 'dashboard')) { echo 'class="active";'; } ?>>
                                    <a href="<?php echo get_absolute_url();?>tracking202/dashboard">
                                        <i class="fa fa-home"></i> Dashboard </a>
                                </li>
                                        <?php if ($userObj->hasPermission("access_to_setup_section")) { ?>
                                            <li <?php if ($navigation[2] == 'setup') { echo 'class="active"'; } ?>>
                                                <a href="<?php echo get_absolute_url();?>tracking202/setup" id="SetupPage"><i class="fa fa-gear"></i>Setup
                                                <i class="fa arrow"></i>
                                                </a>
                                                <?php if ($navigation[2] == 'setup') { ?>
                                                    <ul class="sidebar-nav">
                                                      <li <?php if ($navigation[3] == 'ppc_accounts.php' or !$navigation[3]) { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/setup/ppc_accounts.php">#1 Traffic Sources</a></li>
                                                      <li <?php if ($navigation[3] == 'aff_networks.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/setup/aff_networks.php">#2 Categories</a></li>
                                                      <li <?php if ($navigation[3] == 'aff_campaigns.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/setup/aff_campaigns.php">#3 Campaigns</a></li>
                                                      <li <?php if ($navigation[3] == 'landing_pages.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/setup/landing_pages.php">#4 Landing Pages</a></li>
                                                      <li <?php if ($navigation[3] == 'ads.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/setup/ads.php">#5 Ads</a></li>              <li <?php if ($navigation[3] == 'rotator.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/setup/rotator.php">#6 Redirector</a></li> 
                                                      <li <?php switch($navigation[3]) { case "get_landing_code.php":  case "get_simple_landing_code.php":  case "get_adv_landing_code.php": echo 'class="active"'; break; } ?>><a href="<?php echo get_absolute_url();?>tracking202/setup/get_landing_code.php">#7 Get LP Code</a></li> 
                                                      <li <?php if ($navigation[3] == 'get_trackers.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/setup/get_trackers.php">#8 Get Links</a></li> 
                                                      <li <?php if ($navigation[3] == 'get_postback.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/setup/get_postback.php">#9 Get Postback/Pixel</a></li> 
                                                    </ul>
                                                    <?php } ?>
                                            </li>
                                        <?php } ?>  
                                        <?php /*if ($userObj->hasPermission("access_to_setup_section")) { ?>
                                            <li <?php if ($navigation[2] == 'bots') { echo 'class="active"'; } ?>>
                                                <a href="<?php echo get_absolute_url();?>tracking202/bots/rapidbuilder.php" id="BotsPage">Automation & Bots</a>
                                            </li>
                                        <?php } */ ?>       
                                        <li
                                            <?php if (($navigation[2] == 'overview'))  { echo 'class="active"'; } ?>><a
                                            href="<?php echo get_absolute_url();?>tracking202/overview" id="OverviewPage"><i class="fa fa-search"></i>Overview
                                            <i class="fa arrow"></i>
                                            <?php if (($navigation[1] == 'account' and !$navigation[2]) or ($navigation[2] == 'overview')) { ?>
                                                <ul class="sidebar-nav">
                                                  <li <?php if ($navigation[3] == 'campaign.php' or !$navigation[3]) { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/overview">Campaign Overview</a></li>
                                                  <li <?php if ($navigation[3] == 'breakdown.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/overview/breakdown.php">Breakdown Analysis</a></li>
                                                  <li <?php if ($navigation[3] == 'day-parting.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/overview/day-parting.php">Day Parting</a></li>
                                                  <li <?php if ($navigation[3] == 'week-parting.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/overview/week-parting.php">Week Parting</a></li> 
                                                  <li <?php if ($navigation[3] == 'group-overview.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/overview/group-overview.php">Group Overview</a></li>
                                                </ul>
                                              <?php 

                                              //check for new group overview
                                              $file_dir=  dirname($_SERVER['SCRIPT_FILENAME']).'/group-overview2.php';
                                              //only show if the file exists
                                              if (file_exists($file_dir)){?>
                                              <li <?php if ($navigation[3] == 'group-overview2.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/overview/group-overview2.php">New: Group Overview Filters</a></li>
                                              <?php } ?>
                                          <?php } ?>
                                        </a>

                                        </li>
                                        <li <?php if ($navigation[2] == 'analyze') { echo 'class="active"'; } ?>><a
                                            href="<?php echo get_absolute_url();?>tracking202/analyze" id="AnalyzePage"><i class="fa fa-bars"></i>Analyze
                                            <i class="fa arrow"></i>
                                            </a>
                                            <?php if ($navigation[2] == 'analyze') { ?>
                                                <ul class="sidebar-nav">
                                                  <li <?php if ($navigation[3] == 'keywords.php' or !$navigation[3]) { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/keywords.php">Keywords</a></li>
                                                  <li <?php if ($navigation[3] == 'text_ads.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/text_ads.php">Text Ads</a></li>
                                                  <li <?php if ($navigation[3] == 'referers.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/referers.php">Referers</a></li>
                                                  <li <?php if ($navigation[3] == 'ips.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/ips.php">IPs</a></li>
                                                  <li <?php if ($navigation[3] == 'countries.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/countries.php">Countries</a></li>
                                                  <li <?php if ($navigation[3] == 'regions.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/regions.php">Regions</a></li>
                                                  <li <?php if ($navigation[3] == 'cities.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/cities.php">Cities</a></li>
                                                  <li <?php if ($navigation[3] == 'isp.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/isp.php">ISP/Carrier</a></li>
                                                  <li <?php if ($navigation[3] == 'landing_pages.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/landing_pages.php">Landing Pages</a></li>
                                                  <li <?php if ($navigation[3] == 'devices.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/devices.php">Devices</a></li>
                                                  <li <?php if ($navigation[3] == 'browsers.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/browsers.php">Browsers</a></li>
                                                  <li <?php if ($navigation[3] == 'platforms.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/platforms.php">Platforms</a></li>
                                                  <li <?php if ($navigation[3] == 'variables.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/analyze/variables.php">Custom Variables</a></li>
                                              </ul>
                                          <?php } ?>
                                        </li>
                                        <li <?php if ($navigation[2] == 'visitors') { echo 'class="active"'; } ?>><a
                                            href="<?php echo get_absolute_url();?>tracking202/visitors" id="VisitorsPage"><i class="fa fa-user"></i>Visitors</a></li>
                                        <li <?php if ($navigation[2] == 'spy') { echo 'class="active"'; } ?>><a
                                            href="<?php echo get_absolute_url();?>tracking202/spy" id="SpyPage"><i class="fa fa-user-secret"></i>Spy</a></li>
                                        <?php if ($userObj->hasPermission("access_to_update_section")) { ?>
                                            <li <?php if ($navigation[2] == 'update') { echo 'class="active"'; } ?>>
                                                <a href="<?php echo get_absolute_url();?>tracking202/update" id="UpdatePage"><i class="fa fa-refresh"></i>Update
                                                    <i class="fa arrow"></i>
                                                </a>
                                                <?php if ($navigation[2] == 'update') { ?>
                                                    <ul class="sidebar-nav">
                                                          <li <?php if ($navigation[3] == 'subids.php' or !$navigation[3]) { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/update/subids.php">Update Subids</a></li>
                                                          <li <?php if ($navigation[3] == 'cpc.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/update/cpc.php">Update CPC</a></li>
                                                          <li <?php if ($navigation[3] == 'clear-subids.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/update/clear-subids.php">Reset Campaign Subids</a></li>
                                                          <?php if($userObj->hasPermission("delete_individual_subids")) { ?><li <?php if ($navigation[3] == 'delete-subids.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/update/delete-subids.php">Delete Subids</a></li><?php } ?>
                                                          <li <?php if ($navigation[3] == 'upload.php') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/update/upload.php">Upload Revenue Reports</span></a></li>
                                                    </ul>
                                              <?php } ?>
                                            </li>
                                        <?php } ?>
                                        <?php if ($userObj->hasPermission("access_to_setup_section")) { ?>  
                                        <li <?php if ($navigation[2] == 'logs') { echo 'class="active"'; } ?>><a href="<?php echo get_absolute_url();?>tracking202/logs" id="ExportPage"><i class="fa fa-history"></i>Conversion Logs</a></li>
                                        <?php } ?>  
                                <li <?php if ($navigation[1] == 'tv') { echo 'class="active";'; } ?>>
                                    <a href="">
                                        <i class="fa fa-television"></i> 
                                        TV202  
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <footer class="sidebar-footer">
                        <ul class="sidebar-menu metismenu" id="customize-menu">
                            <li>
                                <ul>
                                    <li class="customize">
                                        <div class="customize-item">
                                            <div class="row customize-header">
                                                <div class="col-4"> </div>
                                                <div class="col-4">
                                                    <label class="title">fixed</label>
                                                </div>
                                                <div class="col-4">
                                                    <label class="title">static</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Sidebar:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Header:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="headerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="title">Footer:</label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div class="col-4">
                                                    <label>
                                                        <input class="radio" type="radio" name="footerPosition" value="">
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize-item">
                                            <ul class="customize-colors">
                                                <li>
                                                    <span class="color-item color-red" data-theme="red"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-orange" data-theme="orange"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-green active" data-theme=""></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-seagreen" data-theme="seagreen"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-blue" data-theme="blue"></span>
                                                </li>
                                                <li>
                                                    <span class="color-item color-purple" data-theme="purple"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <a href="">
                                    <i class="fa fa-cog"></i> Customize </a>
                            </li>
                        </ul>
                    </footer>
                </aside>
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
                <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
                <div class="mobile-menu-handle"></div>
                <article class="content dashboard-page">
                <?php } function template_bottom() { global $version; 
    
    ?>
                </article>
                <footer class="footer">
                    <div class="footer-block buttons">
                        <iframe class="footer-github-btn" src="https://ghbtns.com/github-btn.html?user=modularcode&repo=modular-admin-html&type=star&count=true" frameborder="0" scrolling="0" width="140px" height="20px"></iframe>
                    </div>
                    <div class="footer-block author">
                        <ul>
                            <li> created by
                                <a href="https://github.com/modularcode">ModularCode</a>
                            </li>
                            <li>
                                <a href="https://github.com/modularcode/modular-admin-html#get-in-touch">get in touch</a>
                            </li>
                        </ul>
                    </div>
                </footer>
                <div class="modal fade" id="modal-media">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Media Library</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body modal-tab-container">
                                <ul class="nav nav-tabs modal-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a>
                                    </li>
                                </ul>
                                <div class="tab-content modal-tab-content">
                                    <div class="tab-pane fade" id="gallery" role="tabpanel">
                                        <div class="images-container">
                                            <div class="row"> </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active in" id="upload" role="tabpanel">
                                        <div class="upload-container">
                                            <div id="dropzone">
                                                <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
                                                    <div class="dz-message-block">
                                                        <div class="dz-message needsclick"> Drop files here or click to upload. </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Insert Selected</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <div class="modal fade" id="confirm-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">
                                    <i class="fa fa-warning"></i> Alert</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to do this?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>
        <script src="<?= get_absolute_url() ?>assets/js/app.php"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/fileinput.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/bootstrap-tokenfield.min.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/typeahead.bundle.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/iio-rum.min.js"></script>
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/list.min.js"></script>   
<script type="text/javascript" src="<?php echo get_absolute_url();?>assets/js/list.fuzzysearch.min.js"></script>
<?php if($navigation[1] == 'tracking202') { ?>
<script type="text/javascript">
$(document).ready(function() {
    $('.table').DataTable( {
        "scrollY": 200,
        "scrollX": true
    } );
} );
</script>
<?php } ?>
<script type="text/javascript">
            (function(i,s,o,g,r,a,m){i['ProfitWellObject']=r;i[r]=i[r]||function(){  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m);  })(window,document,'script','https://dna8twue3dlxq.cloudfront.net/js/profitwell.js','profitwell');
          profitwell('auth_token', '574889f9aff2755319487e8819d11658');
          profitwell('user_email', '<?php echo getDashEmail();?>');
        </script>
<script>
var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
var eventer = window[eventMethod];
var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

eventer(messageEvent,function(e) {
    if(typeof e.data =='number'){
          document.getElementById('adframe').height = e.data + 'px';
    }                 
},false);
</script>

    </body>
</html>
<?php } 

?>