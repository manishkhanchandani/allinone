<?php require_once('../Connections/conn.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsUser = 3;
$pageNum_rsUser = 0;
if (isset($_GET['pageNum_rsUser'])) {
  $pageNum_rsUser = $_GET['pageNum_rsUser'];
}
$startRow_rsUser = $pageNum_rsUser * $maxRows_rsUser;

mysql_select_db($database_conn, $conn);
$query_rsUser = "SELECT * FROM first_table";
$query_limit_rsUser = sprintf("%s LIMIT %d, %d", $query_rsUser, $startRow_rsUser, $maxRows_rsUser);
$rsUser = mysql_query($query_limit_rsUser, $conn) or die(mysql_error());
$row_rsUser = mysql_fetch_assoc($rsUser);

if (isset($_GET['totalRows_rsUser'])) {
  $totalRows_rsUser = $_GET['totalRows_rsUser'];
} else {
  $all_rsUser = mysql_query($query_rsUser);
  $totalRows_rsUser = mysql_num_rows($all_rsUser);
}
$totalPages_rsUser = ceil($totalRows_rsUser/$maxRows_rsUser)-1;

$queryString_rsUser = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsUser") == false && 
        stristr($param, "totalRows_rsUser") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsUser = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsUser = sprintf("&totalRows_rsUser=%d%s", $totalRows_rsUser, $queryString_rsUser);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h1>All Users</h1>
<?php if ($totalRows_rsUser > 0) { // Show if recordset not empty ?>
  <table border="1">
    <tr>
      <td><strong>First Name </strong></td>
      <td><strong>Last Name </strong></td>
      <td><strong>Date of Birth </strong></td>
      <td><strong>Gender</strong></td>
      <td><strong>Description</strong></td>
      <td><strong>Marital Status </strong></td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_rsUser['first_name']; ?></td>
        <td><?php echo $row_rsUser['last_name']; ?></td>
        <td><?php echo $row_rsUser['dob']; ?></td>
        <td><?php echo $row_rsUser['gender']; ?></td>
        <td><?php echo $row_rsUser['description']; ?></td>
        <td><?php echo $row_rsUser['marital_status']; ?></td>
      </tr>
      <?php } while ($row_rsUser = mysql_fetch_assoc($rsUser)); ?>
      </table>
  <p> Records <?php echo ($startRow_rsUser + 1) ?> to <?php echo min($startRow_rsUser + $maxRows_rsUser, $totalRows_rsUser) ?> of <?php echo $totalRows_rsUser ?>
      <table border="0" width="50%" align="center">
        <tr>
          <td width="23%" align="center"><?php if ($pageNum_rsUser > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_rsUser=%d%s", $currentPage, 0, $queryString_rsUser); ?>">First</a>
                <?php } // Show if not first page ?>
          </td>
          <td width="31%" align="center"><?php if ($pageNum_rsUser > 0) { // Show if not first page ?>
                <a href="<?php printf("%s?pageNum_rsUser=%d%s", $currentPage, max(0, $pageNum_rsUser - 1), $queryString_rsUser); ?>">Previous</a>
                <?php } // Show if not first page ?>
          </td>
          <td width="23%" align="center"><?php if ($pageNum_rsUser < $totalPages_rsUser) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_rsUser=%d%s", $currentPage, min($totalPages_rsUser, $pageNum_rsUser + 1), $queryString_rsUser); ?>">Next</a>
                <?php } // Show if not last page ?>
          </td>
          <td width="23%" align="center"><?php if ($pageNum_rsUser < $totalPages_rsUser) { // Show if not last page ?>
                <a href="<?php printf("%s?pageNum_rsUser=%d%s", $currentPage, $totalPages_rsUser, $queryString_rsUser); ?>">Last</a>
                <?php } // Show if not last page ?>
          </td>
        </tr>
      </table>
  <?php } // Show if recordset not empty ?></p>
<?php if ($totalRows_rsUser == 0) { // Show if recordset empty ?>
  <p>No User Available. </p>
  <?php } // Show if recordset empty ?></body>
</html>
<?php
mysql_free_result($rsUser);
?>
