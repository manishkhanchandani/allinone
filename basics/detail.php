<?php require_once('../Connections/conn.php'); ?><?php
$maxRows_DetailRS1 = 25;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

mysql_select_db($database_conn, $conn);
$recordID = $_GET['recordID'];
$query_DetailRS1 = "SELECT * FROM first_table WHERE user_id = $recordID";
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $conn) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
		
<table border="1" align="center">
  
  <tr>
    <td>user_id</td>
    <td><?php echo $row_DetailRS1['user_id']; ?> </td>
  </tr>
  <tr>
    <td>first_name</td>
    <td><?php echo $row_DetailRS1['first_name']; ?> </td>
  </tr>
  <tr>
    <td>last_name</td>
    <td><?php echo $row_DetailRS1['last_name']; ?> </td>
  </tr>
  <tr>
    <td>email</td>
    <td><?php echo $row_DetailRS1['email']; ?> </td>
  </tr>
  <tr>
    <td>description</td>
    <td><?php echo $row_DetailRS1['description']; ?> </td>
  </tr>
  <tr>
    <td>dob</td>
    <td><?php echo $row_DetailRS1['dob']; ?> </td>
  </tr>
  <tr>
    <td>gender</td>
    <td><?php echo $row_DetailRS1['gender']; ?> </td>
  </tr>
  <tr>
    <td>marital_status</td>
    <td><?php echo $row_DetailRS1['marital_status']; ?> </td>
  </tr>
  <tr>
    <td>created_on</td>
    <td><?php echo $row_DetailRS1['created_on']; ?> </td>
  </tr>
  
  
</table>

</body>
</html><?php
mysql_free_result($DetailRS1);
?>
