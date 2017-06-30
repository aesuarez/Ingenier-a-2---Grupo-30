<?php
	$connection = mysqli_connect('localhost','root',''	);
	if(!$connection){
		echo 'not connected';		
	}
	
	if(!mysqli_select_db($connection, 'unagauchada')) {
		echo 'Database not selected';
	}

?>