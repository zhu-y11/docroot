<?php

/*$host = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);

function is_allowed($a) {
    $allowed = array('mlnl.net', 'cam.ac.uk', 'ltl.mml.cam.ac.uk');
    $retval = false;
    foreach ($allowed as $v) {
        if (substr($v, 0 - strlen($a)) == $a) {
            $retval = true;
        }
    }
    return $retval;
}*/

//$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
/*header('Content-type: application/json');
echo json_encode($arr);*/
//if(is_allowed($host)) {
    if (isset($_GET['f'])) {
    //$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        //echo json_encode($arr);
        if(preg_match('/^[a-z0-9]+$/i', $_GET['f'])) {
            $url = 'https://drive.google.com/folderview?id=' . $_GET['f'] . '&usp=sharing';
            $dat = file_get_contents( $url );
            //echo json_encode($dat);
            //$dat = trim(preg_replace('~[\r\n]+~', '', $dat));
            //echo json_encode($dat);
            //preg_match_all("/folderModel: \[\[(.*?)\]\]/", $dat, $matches1);
            //preg_match_all("<div class=\"l-t-T-V\" aria-label=\"LEXICAL_PhD2\">", $dat, $matches1);
            preg_match_all("*data-id.*", $dat, $matches1);
            // data-target="doc" 1_uQsSm3rCLdHdJwjY5Y_Ozhsqwh6vt0OBVlVqWCkOBc*
            echo json_encode($matches1);
            //preg_match_all("/\[,\"(.*?)\",/", $matches1[0][0], $matches2);
            //echo json_encode($matches2[1]);
            //echo json_encode($arr);
        }
    }
//}

?>