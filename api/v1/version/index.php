<?php
include_once(substr(dirname( __FILE__ ), 0,-15) . '/config.php'); 
include_once(substr(dirname( __FILE__ ), 0,-15) . '/config/connect2.php');

header('Content-Type: application/json');

echo json_encode(array('version' => $version));

?>