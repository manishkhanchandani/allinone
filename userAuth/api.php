<?php require_once('../Connections/connP100.php'); ?>
<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Content-Type: application/json'); 
header('Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

try {
	include('../functions.php');
	define('APIKEY', 'AIzaSyDnERUhALUFNxWZsjaLpT4_nqIYW2i2jDU');
	$return = array('status' => 1, 'error' => null, 'error_message' => null);
	//http://localhost/web/project1/userAuth/api.php?refreshToken=APRrRCISfs109y7F2pBl8jB4u4P8UdlYosgumIFv_V_gyn-KfYKuQnn5F6cqUnDfLTrgFeDLF7w2dyLxcas53kN8dSlxeLAHQ0PPRwxpVww_o9yvsljFYJSjj9kelTNDVmRhxFm4HvP4Dh11cqsYzwsVcBcgw0EtpmW2bme2FBdQQ89o3QB07MIrr9OLSblC0bBpOLxYHaEtRCIyrCxMbRD2eKy6KiVCFBBbngVFU4H1LUuz-x52u8jnvzFEqWuniXZGW2r2eH60e6C2OPehos_ieXcznxtiS4KMbFGB7y2o2rJUFhoDxNwT7M5HyPWzIigRXrTcOU-MziIX9FFkthy6CIOFbFo5AIF44EwaXuy8t0PNRGBECa4
	
	
	$url = 'https://securetoken.googleapis.com/v1/token?key='.APIKEY;
	
	$post = file_get_contents('php://input');
	$postData = json_decode($post, 1);

	$refreshToken = !empty($postData['refreshToken']) ? $postData['refreshToken'] : '';
	
	if (empty($refreshToken)) {
		throw new Exception('missing error token');
	}
	
	$return['refreshToken'] = $refreshToken;
	$params = array('grant_type' => 'refresh_token', 'refresh_token' => $refreshToken);
	$postParams = json_encode($params);
	
	
	$data = curlpostjson($url, $postParams);
	$output = json_decode($data['output'], 1);
	if (!empty($output['error'])) {
		throw new Exception($output['error']['message'], $output['error']['code']);
	}
	if (empty($output['user_id'])) {
		throw new Exception('incorrect refresh token');
	}
	

	$uid = $output['user_id'];
	$return['uid'] = $uid;
	if ($postData['userData']['uid'] !== $uid) {
		throw new Exception('user id mismatch');
	}
	
	
	$colname_rsView = "-1";
	if (isset($uid)) {
	  $colname_rsView = (get_magic_quotes_gpc()) ? $uid : addslashes($uid);
	}
	mysql_select_db($database_connP100, $connP100);
	$query_rsView = sprintf("SELECT * FROM users_auth WHERE uid = '%s'", $colname_rsView);
	$rsView = mysql_query($query_rsView, $connP100) or die(mysql_error());
	$row_rsView = mysql_fetch_assoc($rsView);
	$totalRows_rsView = mysql_num_rows($rsView);
	mysql_free_result($rsView);

	if ($totalRows_rsView === 0) {
		$insertSQL = sprintf("INSERT INTO users_auth (display_name, profile_img, email, provider_id, access_level, uid, logged_in_time) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($postData['userData']['displayName'], "text"),
                       GetSQLValueString($postData['userData']['photoURL'], "text"),
                       GetSQLValueString($postData['userData']['email'], "text"),
                       GetSQLValueString($postData['userData']['providerId'], "text"),
                       GetSQLValueString('member', "text"),
                       GetSQLValueString($postData['userData']['uid'], "text"),
                       GetSQLValueString(time(), "int"));

		  mysql_select_db($database_connP100, $connP100);
		  $Result1 = mysql_query($insertSQL, $connP100) or die(mysql_error());
	} else {
		$sql = sprintf("UPDATE users_auth set logged_in_time = %s WHERE user_id = %s",
                       GetSQLValueString(time(), "int"),
                       GetSQLValueString($row_rsView['user_id'], "int"));

		  mysql_select_db($database_connP100, $connP100);
		  $Result1 = mysql_query($sql, $connP100) or die(mysql_error());
	}
	
	
	$colname_rsView = "-1";
	if (isset($uid)) {
	  $colname_rsView = (get_magic_quotes_gpc()) ? $uid : addslashes($uid);
	}
	mysql_select_db($database_connP100, $connP100);
	$query_rsView = sprintf("SELECT * FROM users_auth WHERE uid = '%s'", $colname_rsView);
	$rsView = mysql_query($query_rsView, $connP100) or die(mysql_error());
	$row_rsView = mysql_fetch_assoc($rsView);
	$totalRows_rsView = mysql_num_rows($rsView);
	mysql_free_result($rsView);
	
	$_SESSION['MM_Username'] = $row_rsView['email'];
    $_SESSION['MM_UserGroup'] = $row_rsView['access_level'];
    $_SESSION['MM_UserId'] = $row_rsView['user_id'];
	$_SESSION['MM_DisplayName'] = $row_rsView['display_name'];
	$_SESSION['MM_ProfileImg'] = $row_rsView['profile_img'];
	$_SESSION['MM_Uid'] = $row_rsView['uid'];
	$_SESSION['MM_LoggedInTime'] = $row_rsView['logged_in_time'];
	
	$return['row'] = $row_rsView;
	
} catch (Exception $e) {
	$return['status'] = 0;
	$return['error_message'] = $e->getMessage();
	$return['error'] = $e->getCode();
}

echo json_encode($return);
?>