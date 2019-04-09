<?php

include_once(substr(dirname( __FILE__ ), 0,-8) . '/config/connect.php');    

AUTH::require_user();

template_top('API Key Required');  ?> 


<div class="big-alert">

	The application you are trying to use requires a valid Tracking202 API Key. <br/>
	You may enter in your API Key by visiting the <a href="<?php echo get_absolute_url();?>account/account.php">My Account</a> tab in Prosper202.

</div>

        
<?php template_bottom();