<?php
header('Content-type: application/javascript');
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
header('Expires: Sun, 03 Feb 2008 05:00:00 GMT');
header("Pragma: no-cache");
var_dump(substr(dirname( __FILE__ ), 0,-10) . '/config/functions.php');
include_once(substr(dirname( __FILE__ ), 0,-10) . '/config/functions.php');
?>

$(document).ready(function() {
	$.get("<?php echo get_absolute_url();?>account/ajax/alerts.php", function(data) {
		  $( "#tracking202_alerts" ).html(data);
		});

		$.get("<?php echo get_absolute_url();?>account/ajax/tweets.php", function(data) {
		  $( "#tracking202_tweets" ).html(data);
		});

		$.get("<?php echo get_absolute_url();?>account/ajax/posts.php", function(data) {
		  $( "#tracking202_posts" ).html(data);
		});

		$.get("<?php echo get_absolute_url();?>account/ajax/meetups.php", function(data) {
		  $( "#tracking202_meetups" ).html(data);
		});

		$.get("<?php echo get_absolute_url();?>account/ajax/sponsors.php", function(data) {
		  $( "#tracking202_sponsors" ).html(data);
		});
		
		$.ajax({
		  url: "<?php echo get_absolute_url();?>account/ajax/system-checks.php",
		});
});