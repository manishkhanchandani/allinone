<?php require_once('../Connections/connP100.php'); ?>
<?php
// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="failure.php";
  $loginUsername = $_POST['email'];
  $LoginRS__query = "SELECT email FROM users_auth WHERE email='" . $loginUsername . "'";
  mysql_select_db($database_connP100, $connP100);
  $LoginRS=mysql_query($LoginRS__query, $connP100) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO users_auth (display_name, profile_img, email, provider_id, password, access_level, uid) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['display_name'], "text"),
                       GetSQLValueString($_POST['profile_img'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['provider_id'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['access_level'], "text"),
                       GetSQLValueString($_POST['uid'], "text"));

  mysql_select_db($database_connP100, $connP100);
  $Result1 = mysql_query($insertSQL, $connP100) or die(mysql_error());

  $insertGoTo = "sucess.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<p>Register </p>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table>
    <tr valign="baseline">
      <td nowrap align="right">Display_name:</td>
      <td><input type="text" name="display_name" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Profile_img:</td>
      <td><input type="text" name="profile_img" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Email:</td>
      <td><input type="text" name="email" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Provider_id:</td>
      <td><input type="text" name="provider_id" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Password:</td>
      <td><input type="text" name="password" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Access_level:</td>
      <td><input type="text" name="access_level" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Uid:</td>
      <td><input type="text" name="uid" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>
