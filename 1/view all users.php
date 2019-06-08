<html>
<body>
<?php
$connect=mysqli_connect("localhost","root","");
	$db=mysqli_select_db($connect,"credit");
$q="select * from credit;";
  $val=mysqli_query($connect,$q);
   $n=mysqli_num_rows($val);
   
   for($i=0;$i<$n;$i++)
   {
	$row=mysqli_fetch_array($val);   
	   echo $row["user"]."<br>";
	   echo $row["credits"]."<br>";
   }
   ?>
   </body>
   </html>