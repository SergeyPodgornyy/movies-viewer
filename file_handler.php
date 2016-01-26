<?php
include("inc/db.php");
include("inc/functions.php");

header('Content-Type: text/plain; charset=utf-8');

try {

	if ((($_FILES["file"]["type"] == "application/xml")
		|| ($_FILES["file"]["type"] == "text/xml"))
		&& ($_FILES["file"]["size"] < 100000)){
		
		$file = simplexml_load_file($_FILES["file"]["tmp_name"]);

	    foreach($file->item as $item){
	    	$title = clear($item->title);
	    	$year = clear($item->year);

	    	if(!preg_match('/(1|2)[0-9]{3}/', $year)){
				$year=date("Y");
			}

	    	$format = clear($item->format);
	    	$cast_obg = $item->cast;

	    	$cast = array();
	    	
	    	foreach ($cast_obg->actor as $key => $value) {
	    		array_push($cast, [
	    							clear($value->name->__toString()),
	    							clear($value->surname->__toString())
	    							]);
	    	}

	    	add_item($db,$title,$year,$format,$cast);
	    }
	    
	    header("location:index.php");
	} else {
	    echo "Sorry, there was an error uploading your file. Only XML files are allowed.";
	}

} catch (RuntimeException $e) {

    echo $e->getMessage();

}
