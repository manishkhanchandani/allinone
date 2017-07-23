<?php
//don't use this file, use token.php
include('../../functions.php');
define('APIKEY', 'AIzaSyDnERUhALUFNxWZsjaLpT4_nqIYW2i2jDU');
$url = 'https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyAssertion?key='.APIKEY;


$params = array('postBody' => 'id_token=eyJhbGciOiJSUzI1NiIsImtpZCI6Ijg0ZDlkNmM0ZTAwNTRhMjM4Mzk2OWFlODA0MmY3OWMzMDIyMTU1N2UifQ.eyJhenAiOiI5Mzg3OTUyMjMzNjItN3JiNmFxZDRjdW1lMmYzM2hjZ2IxcjdwOXIwMXFiOGQuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJhdWQiOiI5Mzg3OTUyMjMzNjItN3JiNmFxZDRjdW1lMmYzM2hjZ2IxcjdwOXIwMXFiOGQuYXBwcy5nb29nbGV1c2VyY29udGVudC5jb20iLCJzdWIiOiIxMTI5MTMxNDc5MTc5ODE1Njg2NzgiLCJlbWFpbCI6Im1hbmlzaGtrNzRAZ21haWwuY29tIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsImF0X2hhc2giOiJuUF9NUmVSVzVsejRQZVQ3Q2Y3NmJ3IiwiaXNzIjoiYWNjb3VudHMuZ29vZ2xlLmNvbSIsImlhdCI6MTUwMDc0MTc5MywiZXhwIjoxNTAwNzQ1MzkzfQ.XQ19Ox3FXQPbMwuHwwixF3Y_RmFsS4EC8u6upwtkdZGXAlKV9EA7IeIJDo62z_b8uOlePdM5S68bMc_ytOCL1Bf06DTtlvqLig7CVUnBRIhwilLKw9-2BsebOfnTsH5xT8PprnTjZnYsqhw4FYefKpwpneDjXs6mui6-40u0W4f5s6k8qxT-nS5jxEpHHIq-ATrgosavQ-ZeQa0s1H8daaikdwN2Av_HFkYyXFMlVUAbRYV47Z7zz_91P0xqK03q5f0jlHSzyLznge1_FxsHMjN4mqL6i_Ng2_OeHi1pQ9qePV21MXde08dQ_U9bwTZEfVuOe42Jmacor_5Uen6_eQ&providerId=[google.com]', 'requestUri' => '[http://localhost/web/project1/manish/firebase/oauth.php]', 'returnIdpCredential' => true, 'returnSecureToken' => true);
$postParams = json_encode($params);


$data = curlpostjson($url, $postParams);

pr(json_decode($data['output'], 1));

/*
curl 'https://securetoken.googleapis.com/v1/token?key=[API_KEY]' \
-H 'Content-Type: application/x-www-form-urlencoded' \
--data 'grant_type=refresh_token&refresh_token=[REFRESH_TOKEN]'



{
  "expires_in": "3600",
  "token_type": "Bearer",
  "refresh_token": "[REFRESH_TOKEN]",
  "id_token": "[ID_TOKEN]",
  "user_id": "tRcfmLH7o2XrNELi...",
  "project_id": "1234567890"
}
*/

?>