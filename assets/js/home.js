$(document).ready(function() {
	$.get("/account/ajax/alerts.php", function(data) {
		  $( "#tracking202_alerts" ).html(data);
		});

		$.get("/account/ajax/tweets.php", function(data) {
		  $( "#tracking202_tweets" ).html(data);
		});

		$.get("/account/ajax/posts.php", function(data) {
		  $( "#tracking202_posts" ).html(data);
		});

		$.get("/account/ajax/meetups.php", function(data) {
		  $( "#tracking202_meetups" ).html(data);
		});

		$.get("/account/ajax/sponsors.php", function(data) {
		  $( "#tracking202_sponsors" ).html(data);
		});
		
		$.ajax({
		  url: "/account/ajax/system-checks.php",
		});
});