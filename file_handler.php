<?php
require_once("inc/db.php");
require_once("inc/functions.php");

header('Content-Type: text/plain; charset=utf-8');

try {
    if ((($_FILES["file"]["type"] == "application/xml") || ($_FILES["file"]["type"] == "text/xml"))
        && ($_FILES["file"]["size"] < 100000)) {

        $file = simplexml_load_file($_FILES["file"]["tmp_name"]);

        foreach ($file->item as $item) {
            $title = clear($item->title);
            $year = clear($item->year);

            if (!preg_match('/(1|2)[0-9]{3}/', $year)) {
                $year = date("Y");
            }

            $format = clear($item->format);
            $castObj = $item->cast;

            $cast = array();

            foreach ($castObj->actor as $key => $value) {
                array_push($cast, [
                    clear($value->name->__toString()),
                    clear($value->surname->__toString())
                ]);
            }

            addItem($db, $title, $year, $format, $cast);
        }

        header("Location: index.php");
    } else {
        echo "Sorry, there was an error uploading your file. Only XML files are allowed.";
    }

} catch (RuntimeException $e) {
    echo $e->getMessage();
}
