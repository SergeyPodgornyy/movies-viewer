<?php

function get_table_rows($db,$where="",$sort=""){

	$sql = "SELECT info.id,title,format,year,
			  		GROUP_CONCAT(CONCAT(name,' ',surname) SEPARATOR ', ') AS actors 
			  		FROM cast 
			  		INNER JOIN info 
			  		ON info.id=cast.info_id ".
			  		$where
			  		." GROUP BY info_id".
			  		$sort;

	$select = $db->select($sql);

	foreach ($select as $row) {
		    $output .= "<tr>
			  	<td>".$row['id']."</td>
			  	<td><a href='detail.php?id=".$row['id']."'>".$row["title"]."</a></td>
			  	<td>".$row["year"]."</td>
			  	<td>".$row["format"]."</td>
			  	<td>".$row["actors"]."</td>
			  	<td><a href='delete.php?id=".$row['id']."'>
			  			<img src='img/1453586210_17.svg' alt='Delete button' id='delete-".$row['id']."'>
			  		</a>
			  	</td>
			  </tr>";
		}
	return $output;
}

function get_item($db,$sql){
	$select = $db->select($sql);

	return $select[0];
}

function where($title,$actor){
	if(isset($title)){
		$where = "WHERE title LIKE '%".$title."%'";
	} else if(isset($actor)){
		$where = "WHERE name LIKE '%".$actor."%' OR surname LIKE '%".$actor."%'";
	} else {
		$where = "";
	}
	return $where;
}

function sortQuery($sort){
	if(isset($sort)){
		$result = " ORDER BY title ".$sort." ";
	} else {
		$result = "";
	}
	return $result;
}