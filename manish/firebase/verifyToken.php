<?php
//don't use this file, use token.php
include('../../functions.php');
define('APIKEY', 'AIzaSyDnERUhALUFNxWZsjaLpT4_nqIYW2i2jDU');
$url = 'https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyCustomToken?key='.APIKEY;
$params = array('token' => 'ya29.GmKQBN9K0AttoM2lUxH-en6egzQDbHg9MRGSv_gK-8fX3ZY346D6WNioOvFrCK7eYy49DPl03d27bUg76KC-aVJZn2Nc4Yif_DdbaAls-_V0SOzzOKX8DXaYrJIUbltJFVTGhA', 'returnSecureToken' => true);
$postParams = json_encode($params);


$data = curlpostjson($url, $postParams);

pr(json_decode($data['output'], 1));
pr($data);

/*
curl 'https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyCustomToken?key=AIzaSyDnERUhALUFNxWZsjaLpT4_nqIYW2i2jDU' \
-H 'Content-Type: application/json' \
--data-binary '{"token":"ya29.GmKQBN9K0AttoM2lUxH-en6egzQDbHg9MRGSv_gK-8fX3ZY346D6WNioOvFrCK7eYy49DPl03d27bUg76KC-aVJZn2Nc4Yif_DdbaAls-_V0SOzzOKX8DXaYrJIUbltJFVTGhA","returnSecureToken":true}'

curl 'https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyCustomToken?key=AIzaSyDnERUhALUFNxWZsjaLpT4_nqIYW2i2jDU' -H 'Content-Type: application/json' --data-binary '{"token":"ya29.GmKQBN9K0AttoM2lUxH-en6egzQDbHg9MRGSv_gK-8fX3ZY346D6WNioOvFrCK7eYy49DPl03d27bUg76KC-aVJZn2Nc4Yif_DdbaAls-_V0SOzzOKX8DXaYrJIUbltJFVTGhA","returnSecureToken":true}'
*/
?>