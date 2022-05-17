<?php
include("config.php");
$roll=$_POST['roll'];
$class=$_POST['class'];
$email=$_POST['email'];
$nam=$_POST['name'];

if($roll==NULL || $class==NULL || $email==NULL || $nam==NULL)
{
	//
}
else
{
	$sql=mysqli_query($al,"INSERT INTO students(name,roll,class,email) VALUES('$nam','$roll','$class','$email')");
	if($sql)
	{
		$msg="Successfully Registered";
	}
	else
	{
		$msg="Email Already Exists";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Result</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body><br />

<div align="center">
<span class="head">Online Result Display</span>
<hr class="hr" />
<br />
<br />
<span class="subhead">Registration</span>
<br />
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Name :</td><td><input type="text" name="name" class="fields" required="required" size="15" placeholder="Enter Full Name" /></td></tr>
<tr><td class="labels">Roll No.:</td><td><input type="text" name="roll" class="fields" required="required" size="15" placeholder="Enter Roll No." /></td></tr>
<tr><td class="labels">Classes :</td><td><select name="class" class="fields" style="background-color:#093d3d;" required>
<option value="" disabled="disabled" selected="selected">- - Classes - -</option>
<option value="1">First Class</option>
<option value="2">Second Class</option>
<option value="3">Third Class</option>
<option value="4">Fourth Class</option>
<option value="5">Fifth Class</option>
<option value="6">Sixth Class</option>
<option value="7">Seventh Class</option>
<option value="8">Eighth Class</option>
</select>
</td></tr>
<tr><td class="labels">E-Mail ID : </td><td><input type="email" name="email" class="fields" size="15" placeholder="Enter Email" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Register" class="fields" /></td></tr>
</table>
</form>
<br />
<br />
<a href="index.php" class="link">Main Page</a>
</div>
</body>
</html>