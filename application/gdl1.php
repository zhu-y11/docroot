<?php

$allowed_host = 'mlnl.net';
$host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);

if(substr($host, 0 - strlen($allowed_host)) == $allowed_host) {
    if (isset($_GET['f'])) {
        if(preg_match('/^[a-z0-9]+$/i', $_GET['f'])) {
            $url = 'https://drive.google.com/folderview?id=' . $_GET['f'] . '&usp=sharing';
            $dat = file_get_contents( $url );
            $dat = trim(preg_replace('~[\r\n]+~', '', $dat));
            preg_match_all("/folderModel: \[\[(.*?)\]\]/", $dat, $matches1);
            preg_match_all("/\[,\"(.*?)\",/", $matches1[0][0], $matches2);
            echo json_encode($matches2[1]);
        }
    }
}

?>