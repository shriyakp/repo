<html>
<body>
<form method="post">
<label>username</label>
<input type="text" name="username">
<input type="submit" name="ok" value="ok">
<?php
$connect=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($connect,"credit");
if(isset($_REQUEST["ok"]))
{
	if(isset($_REQUEST["username"]))
	{
		$name=$_REQUEST["username"];
		$q="select * from credit where user='$name';";
		$val=mysqli_query($connect,$q);
		$n=mysqli_num_rows($val);
		if($n!=0)
		{
			$row=mysqli_fetch_array($val); 
			echo "<br>";
			echo $row["user"]."<br>";
	       echo $row["credits"]."<br>";
		}
		else
			echo "user not found";
	}
}
	   
   ?>

   </body>
   </html>