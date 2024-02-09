<?php

$con=mysqli_connect("localhost","root","","college");

if(isset($_POST['ok']))
{
	
	$fid=$_POST['fid'];
	$fname=$_POST['fname'];
	$salary=$_POST['sal'];
	
	$q="update faculty set fname='$fname',salary='$salary' where fid='$fid'";
	$r=mysqli_query($con,$q);
	$ans=mysqli_affected_rows($con);
	if($ans>0)
	{
		header('location:display.php');
	}
	else
	{
		echo mysqli_error($con);
	}
}


if(isset($_GET['key']) && $_GET['key']=="e")
{
	$query="select * from faculty where fid=".$_GET['id'];
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_array($result);
}

?>

<html>
<head></head>
<body>
	<form method="post">
		<table align="center" border=2 cellpadding=5 cellspacing=5>
			<tr>
				<td><b>Faculty ID :</b></td>
				<td><input type="text" name="fid" value="<?php echo $row['fid']; ?>" /></td>
			</tr>
			<tr>
				<td><b>Faculty Name :</b></td>
				<td><input type="text" name="fname" value="<?php echo $row['fname']; ?>" required /></td>
			</tr>
			<tr>
				<td><b>Salary :</b></td>
				<td><input type="text" name="sal" value="<?php echo $row['salary']; ?>" required /></td>
			</tr>
			<tr>
				<td align="center" colspan=2>
					<input type="image" src='submit.jpg' height=80 width=80 name="ok"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
mysqli_close($con);
?>