<?php

$url = "http://www.talks.cam.ac.uk/show/rss/34176";
$fileContents = file_get_contents($url);
$fileContents = trim(str_replace('"', "'", $fileContents));
$simpleXml = simplexml_load_string($fileContents);
$json = json_encode($simpleXml);
$json = json_decode($json);
echo json_encode($json);

?>
