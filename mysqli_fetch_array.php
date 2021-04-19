<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='XYZ';
//creating connection
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
//checking connection
if($conn->connect_error){
die("connection failed:".$conn->connect_error);
}
echo "connected successfully"."<br>";
$sql='SELECT emp_id,emp_name,emp_salary FROM employee';
$result=mysqli_query($conn,$sql);
//Numeric array
while($row=mysqli_fetch_array($result,MYSQLI_NUM))
{
 echo "$row[0] $row[1] $row[2]"."<br>";
}
echo "<br>";
mysqli_data_seek($result,0);
//Associative array
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
 echo "EMP ID: ".$row["emp_id"]."-EMP NAME: ".$row["emp_name"]."-EMP SALARY: ".$row["emp_salary"]."<br>";
}
//free result set
mysqli_free_result($result);
?>