<?php

function get_item($key,$value){
	$output = "<tr>
			  	<td>".$key."</td>
			  	<td><a href='detail.php?id=".$key."'>".$value["title"]."</a></td>
			  	<td>".$value["year"]."</td>
			  	<td>".$value["format"]."</td>
			  	<td>".implode(", ", $value["cast"])."</td>
			  	<td><img src='img/1453586210_17.svg' alt='Delete button' id='delete-".$key."'></td>
			  </tr>";
	return $output;
}