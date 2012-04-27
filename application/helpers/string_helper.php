<?php

function random_string($max_length) {
	$result_string = "";
	$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	
	while(strlen($result_string) < $max_length)
	{
			$next_rand = rand(0, 52);
			$result_string .= $chars[$next_rand];
			
	}

	return $result_string;
}

?>
