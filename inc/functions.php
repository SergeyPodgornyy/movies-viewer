<?php

// Display table rows with movies from database
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

// Return selected item
function get_item($db,$sql){
	$select = $db->select($sql);

	return $select[0];
}

// Delete item from database
function delete_item($db,$sql){
	return $db->delete($sql);
}

// Add new item to database
function add_item($db,$title,$year,$format,$cast){
	$sql = "INSERT INTO info (title,year,format) 
			VALUES (:title,:year,:format)";
	$params = [":title"=>$title, ":year"=>$year, ":format"=>$format];
	$db->insert($sql,$params);

	$id = $db->select("SELECT id FROM info ORDER BY id DESC LIMIT 1")[0]["id"];

	foreach ($cast as $value) {
		$sql = "INSERT INTO cast (name,surname,info_id) 
			VALUES (:name, :surname, :info_id)";

		$name = $value[0];
		$surname = $value[1];
		$params = [':name'=>$name,':surname'=>$surname,':info_id'=>$id];

		$db->insert($sql,$params);
	}
}

// Set WHERE clause - return movies from search
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

// Set ORDER BY keyword - to sort movies by title
function sortQuery($sort){
	if(isset($sort)){
		$result = " ORDER BY title ".$sort." ";
	} else {
		$result = "";
	}
	return $result;
}

// Clear user inputs
function clear($text){
	$text = strip_tags($text);
    $text = trim($text);
    $text = htmlspecialchars($text);
    return $text;
}