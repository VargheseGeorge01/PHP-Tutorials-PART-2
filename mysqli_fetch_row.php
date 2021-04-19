<?php 
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='XYZ';
//creating connection
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
//checking connection
if($conn->connect_error){
die("Connection failed:".$conn->connect_error);
}
echo "connected successfully"."<br>";
//fetching data & display in webpage
$sql='SELECT emp_id,emp_name,emp_salary FROM employee';
if($result=mysqli_query($conn,$sql))
{
 //fetch one and one row
 while($row=mysqli_fetch_row($result))
 {
  echo "$row[0].$row[1].$row[2]"."<br>";
 }
 // free result set
 mysqli_free_result($result);
}
?>