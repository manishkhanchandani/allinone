<?php require_once('../Connections/conn.php'); ?>
<?php
mysql_select_db($database_conn, $conn);
$query_rsCategories = "SELECT * FROM fourth_table ORDER BY category ASC";
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
<table width="50%" border="1">
  <tr>
    <td><strong>id</strong></td>
    <td><strong>category</strong></td>
    <td><strong>sorting</strong></td>
    <td>Edit</td>
    <td>Delete</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_rsCategories['id']; ?></td>
      <td><?php echo $row_rsCategories['category']; ?></td>
      <td><?php echo $row_rsCategories['sorting']; ?></td>
      <td><a href="edit1.php?id=<?php echo $row_rsCategories['id']; ?>">Edit</a></td>
      <td><a href="deleteCategory.php?id=<?php echo $row_rsCategories['id']; ?>">Delete</a></td>
    </tr>
    <?php } while ($row_rsCategories = mysql_fetch_assoc($rsCategories)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($rsCategories);
?>
