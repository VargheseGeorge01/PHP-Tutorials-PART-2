<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='XYZ';
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
if($conn->connect_error){
die("Connection falied:".$conn->connect_error);
}
echo "connected succesfully";
echo "<br>";
$sql='SELECT emp_id,emp_name,emp_salary FROM employee';
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
//output data of each row
while($row=mysqli_fetch_assoc($result)){
echo "EMP ID: ".$row["emp_id"]."-EMP NAME: ".$row["emp_name"]."EMP SALARY: ".$row["emp_salary"]."<br>";
}
}else{
echo "0 results";
}
echo "fetched data successfully";
?>