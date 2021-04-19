//To return the number of fields in a result set
<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='XYZ';
//creating connection
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
//checking creation
if($conn->connect_error){
die("connection failed:".$conn->connect_error);
}
echo "connected successfully"."<br>";
$sql='SELECT emp_id,emp_name,emp_salary FROM employee';
if($result=mysqli_query($conn,$sql))
{
 //Return the number of filed in result set
 $fieldcount=mysqli_num_fields($result);
 printf("Result set has %d fileds.\n",$fieldcount);
 //Free result set
mysqli_free_result($result);
}
?>