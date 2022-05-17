<?php
include("config.php");
session_start();
if(!isset($_SESSION['email']))
{
	header("location:index.php");
}
$email=$_SESSION['email'];
$a=mysqli_query($al,"SELECT * FROM faculty WHERE email='$email'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
$class=$b['class'];
$sub1=$_POST['sub1'];
$sub2=$_POST['sub2'];
$sub3=$_POST['sub3'];
$sub4=$_POST['sub4'];
$sub5=$_POST['sub5'];
if($sub1==NULL || $sub2==NULL || $sub3==NULL || $sub4==NULL || $sub5==NULL)
{
	// 
}
else
{	
	$sql=mysqli_query($al,"INSERT INTO subjects(sub1,sub2,sub3,sub4,sub5,class) VALUES('$sub1','$sub2','$sub3','$sub4','$sub5','$class')");
	if($sql)
	{
		$msg="Successfully Saved";
	}
	else
	{
		$msg="Already Saved for Your class";
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
<span class="subhead">Add Subjects</span>
<br />
<br />
<form method="post" action="">
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Subject 1 : </td><td><input type="text" required="required" size="20" class="fields" placeholder="Enter Subject Name" name="sub1" /></td></tr>

<tr><td class="labels">Subject 2 : </td><td><input type="text" required="required" size="20" class="fields" placeholder="Enter Subject Name" name="sub2" /></td></tr>

<tr><td class="labels">Subject 3 : </td><td><input type="text" required="required" size="20" class="fields" placeholder="Enter Subject Name" name="sub3" /></td></tr>

<tr><td class="labels">Subject 4 : </td><td><input type="text" required="required" size="20" class="fields" placeholder="Enter Subject Name" name="sub4" /></td></tr>

<tr><td class="labels">Subject 5 : </td><td><input type="text" required="required" size="20" class="fields" placeholder="Enter Subject Name" name="sub5" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="fields" value="SAVE" /></td></tr>
</table>
</form>
<br />
<br />
<br />
<a href="home.php" class="cmd">HOME</a>
</div>
</body>
</html>