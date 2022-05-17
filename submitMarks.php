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
if(!empty($_POST))
{
	$sub1=$_POST['sub1'];
	$sub2=$_POST['sub2'];
	$sub3=$_POST['sub3'];
	$sub4=$_POST['sub4'];
	$sub5=$_POST['sub5'];
	$roll=$_POST['roll'];
	if($sub1==NULL || $sub2==NULL || $sub3==NULL || $sub4==NULL || $sub5==NULL || $roll==NULL)
	{
		//
	}
	else
	{
		$total=$sub1+$sub2+$sub3+$sub4+$sub5;
		$per=($total/100)*100;
		if($per<=35)
		{
			$result="Fair";
		}else
		if($per>=36 && $per<=50)
			{
				$result="Good";
			}
			elseif($per>=51 && $per<=70)
				{
					$result="Better";
				}
				else
				{
					$result="Best";
				}
				$sql=mysqli_query($al,"INSERT INTO marks(roll,class,sub1,sub2,sub3,sub4,sub5,total,percent,result) VALUES('$roll','$class','$sub1','$sub2','$sub3','$sub4','$sub5','$total','$per','$result')");
				if($sql)
				{
					$msg="Successfully Saved Marks";
				}
				else
				{
					$msg="Marks Already Submitted to this Roll No.";
				}
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
<span class="subhead">Submit Marks</span>
<br />
<br />
<?php 
$x=mysqli_query($al,"SELECT * FROM subjects WHERE class='$class'");
$y=mysqli_fetch_array($x);
$m=mysqli_query($al,"SELECT * FROM students WHERE class='$class'");
?>
<form method="post" action="">
<table border="0" cellpadding="5" cellspacing="5" class="design">
<tr><td colspan="2" align="center" class="msg"><?php echo $msg;?></td></tr>
<tr><td class="labels">Roll No. : </td><td>
<select name="roll" class="fields" style="background-color:#093d3d;" required>
<option value="" selected="selected" disabled="disabled">- - Select Roll - -</option>
<?php
while($n=mysqli_fetch_array($m))
{
	?>
<option value="<?php echo $n['roll'];?>"><?php echo $n['roll'];?></option>
<?php } ?>
</select></td></tr>
<tr><td class="labels"><?php echo $y['sub1'];?></td><td><input type="text" name="sub1" class="fields" size="5" placeholder="20" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['sub2'];?></td><td><input type="text" name="sub2" class="fields" size="5" placeholder="20" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['sub3'];?></td><td><input type="text" name="sub3" class="fields" size="5" placeholder="20" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['sub4'];?></td><td><input type="text" name="sub4" class="fields" size="5" placeholder="20" required="required" /></td></tr>
<tr><td class="labels"><?php echo $y['sub5'];?></td><td><input type="text" name="sub5" class="fields" size="5" placeholder="20" required="required" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="fields" value="Submit" /></td></tr>
</table>
</form>
<br />
<br />
<br />
<a href="home.php" class="cmd">HOME</a>
</div>
</body>
</html>