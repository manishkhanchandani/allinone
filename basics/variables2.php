<?php
echo $_POST['var3'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h1>Post Form</h1>
<form id="form1" name="form1" method="post" action="">
  <p>Var 1: 
    <input name="var1" type="text" id="var1" />
</p>
  <p>Var 2: 
    <input name="var2" type="text" id="var2" />
</p>
  <p>Var 3: 
    <input name="var3" type="text" id="var3" />
  </p>
  <p>
    <label>
    <input type="submit" name="Submit" value="Submit" />
    </label>
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
