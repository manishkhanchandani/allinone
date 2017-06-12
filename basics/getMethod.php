<?php 
echo $_GET['kw'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h1>Get Method</h1>
<form id="form1" name="form1" method="get" action="">
  Keyword: 
  <label>
  <input name="kw" type="text" id="kw" />
  </label> 
  Title: 
  <label>
  <input name="title" type="text" id="title" />
  </label>
  <label>
  <input type="submit" name="Submit" value="Submit" />
  </label>
</form>
<p>&nbsp;</p>
</body>
</html>
