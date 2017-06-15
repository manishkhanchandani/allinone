<?php require_once('../Connections/conn.php'); ?>
<?php
$colname_rsCategories = "-1";
if (isset($_GET['q'])) {
  $colname_rsCategories = (get_magic_quotes_gpc()) ? $_GET['q'] : addslashes($_GET['q']);
}
mysql_select_db($database_conn, $conn);
$query_rsCategories = sprintf("SELECT * FROM fourth_table WHERE category LIKE '%%%s%%' ORDER BY category ASC", $colname_rsCategories);
$rsCategories = mysql_query($query_rsCategories, $conn) or die(mysql_error());
$row_rsCategories = mysql_fetch_assoc($rsCategories);
$totalRows_rsCategories = mysql_num_rows($rsCategories);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h1>Categories </h1>
<form id="form1" name="form1" method="get" action="">
Category:
<input name="q" type="text" id="q" />
  <label>
  <input type="submit" name="Submit" value="Submit" />
</label>
</form>
<p>&nbsp;</p>
<table width="100%" border="1">
  <tr>
    <td><strong>id</strong></td>
    <td><strong>category</strong></td>
    <td><strong>sorting</strong></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rsCategories['id']; ?></td>
      <td><?php echo $row_rsCategories['category']; ?></td>
      <td><?php echo $row_rsCategories['sorting']; ?></td>
    </tr>
    <?php } while ($row_rsCategories = mysql_fetch_assoc($rsCategories)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($rsCategories);
?>
