<?php require_once('../Connections/conn.php'); ?>
<?php
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE first_table SET first_name=%s, last_name=%s, email=%s, dob=%s, gender=%s, description=%s, marital_status=%s WHERE user_id=%s",
                       GetSQLValueString($_POST['first_name'], "text"),
                       GetSQLValueString($_POST['last_name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['dob'], "date"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['description'], "text"),
                       GetSQLValueString($_POST['marital_status'], "text"),
                       GetSQLValueString($_POST['user_id'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "browse1.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsEdit = "-1";
if (isset($_GET['user_id'])) {
  $colname_rsEdit = (get_magic_quotes_gpc()) ? $_GET['user_id'] : addslashes($_GET['user_id']);
}
mysql_select_db($database_conn, $conn);
$query_rsEdit = sprintf("SELECT * FROM first_table WHERE user_id = %s", $colname_rsEdit);
$rsEdit = mysql_query($query_rsEdit, $conn) or die(mysql_error());
$row_rsEdit = mysql_fetch_assoc($rsEdit);
$totalRows_rsEdit = mysql_num_rows($rsEdit);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
</head>

<body>
<h1>Edit Form Using Method 2</h1>
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <strong>First Name:</strong> 
  <label>
  <input name="first_name" type="text" id="first_name" value="<?php echo $row_rsEdit['first_name']; ?>" />
  </label>
  <p><strong>Last Name:</strong> 
    <input name="last_name" type="text" id="last_name" value="<?php echo $row_rsEdit['last_name']; ?>" />
  </p>
  <p><strong>Email:</strong> 
    <label>
    <input name="email" type="text" id="email" value="<?php echo $row_rsEdit['email']; ?>" />
    </label>
  </p>
  <p><strong>Date of Birth</strong>: 
    <input name="dob" type="text" id="dob" value="<?php echo $row_rsEdit['dob']; ?>" />
  </p>
  <p><strong>Gender:</strong> 
    <label>
    <input <?php if (!(strcmp($row_rsEdit['gender'],"male"))) {echo "checked=\"checked\"";} ?> name="gender" type="radio" value="male" />
    </label>
  Male 
  <label>
  <input <?php if (!(strcmp($row_rsEdit['gender'],"female"))) {echo "checked=\"checked\"";} ?> name="gender" type="radio" value="female" />
  </label>
  Female</p>
  <p><strong>Description:</strong></p>
  <p>
    <label>
    <span class="style1">
    <textarea name="description" cols="65" rows="10" id="description"><?php echo $row_rsEdit['description']; ?></textarea>
    </span>    </label>
  </p>
  <p><strong>Marital Status</strong>: 
    <label>
    <select name="marital_status" id="marital_status">
      <option value="Single" <?php if (!(strcmp("Single", $row_rsEdit['marital_status']))) {echo "selected=\"selected\"";} ?>>Single</option>
      <option value="Married" <?php if (!(strcmp("Married", $row_rsEdit['marital_status']))) {echo "selected=\"selected\"";} ?>>Married</option>
      <option value="Widowed" <?php if (!(strcmp("Widowed", $row_rsEdit['marital_status']))) {echo "selected=\"selected\"";} ?>>Widowed</option>
      <option value="Separated" <?php if (!(strcmp("Separated", $row_rsEdit['marital_status']))) {echo "selected=\"selected\"";} ?>>Separated</option>
    </select>
    </label>
</p>
  <p>
    <label>
    <input type="submit" name="Submit" value="Update Record" />
    </label>
    <input name="user_id" type="hidden" id="user_id" value="<?php echo $row_rsEdit['user_id']; ?>" />
  </p>
  <p>&nbsp;</p>
  <input type="hidden" name="MM_update" value="form1">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsEdit);
?>
