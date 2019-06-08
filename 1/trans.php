<html>
<body>
<form method="post">
<label>username from</label>
<input type="text" name="username">
<label>credits</label>
<input type="text" name="cr">
<label>username to</label>
<input type="text" name="username1">
<input type="submit" name="ok" value="ok">
<?php
$connect=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($connect,"credit");
if(isset($_REQUEST["ok"]))
{
	if(isset($_REQUEST["username"]))
	{
		$name=$_REQUEST["username"];
		$name1=$_REQUEST["username1"];
		$cr=$_REQUEST["cr"];
		$q="select * from credit where user='$name';";
		$val=mysqli_query($connect,$q);
		$q1="select * from credit where user='$name1';";
		$val1=mysqli_query($connect,$q1);
		$row=mysqli_fetch_array($val);
		$row1=mysqli_fetch_array($val1);
		$row["credits"]=$row["credits"]-$cr;
		$row1["credits"]=$row1["credits"]+$cr;
		echo "<br>";
		echo $row["user"];
		echo "<br>";
		echo $row["credits"];
		echo "<br>";
		echo $row1["user"];
		echo "<br>";
		echo $row1["credits"];
		echo "<br>";
		$a=$row["user"];
		$a1=$row["credits"];
		$b=$row1["user"];
		$b1=$row1["credits"];
		$w="UPDATE `credit` SET `user`='$a',`credits`='$a1' WHERE user='$name'; ";
		//echo $w;
		$w1="UPDATE `credit` SET `user`='$b',`credits`='$b1' WHERE user='$name1'; ";
		$val2=mysqli_query($connect,$w);
		$val3=mysqli_query($connect,$w1);
	}
}
	   
   ?>

   </body>
   </html>