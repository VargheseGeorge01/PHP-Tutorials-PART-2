<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='XYZ';
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$db);
if($conn->connect_error){
echo "failed to connect to database".$conn->connect_error;
}

$sql="SELECT * FROM employee";
$rslt=mysqli_query($conn,$sql);

if(isset($_POST['insert']))
{
  $name=$_POST['name'];
  $address=$_POST['address'];
  $salary=$_POST['salary'];

 $sql="INSERT INTO employee(emp_name,emp_add,emp_salary) VALUES('$name','$address','$salary')";
 if(mysqli_query($conn,$sql)){
 }
 else
 {
  echo "Error:".mysqli_error($conn);
 }
 unset($_POST['insert']);
 header("Location:formoperations.php");
}


if(isset($_POST['delete']))
{
 $maxsal=$_POST['maxsal'];
 $sql="DELETE FROM employee WHERE emp_salary>$maxsal";
 if(mysqli_query($conn,$sql)){ }
 else
 {
   echo "Error:".mysqli_error($conn);
 }
 unset($_POST['delete']);
 header("Locatiom:formoperations.php");
}


if(isset($_POST['update']))
{
 $id = $_POST['id'];
 $salary = $_POST['newsalary'];
 $sql = "UPDATE employee SET emp_salary=$salary WHERE emp_id=$id";
 if(mysqli_query($conn,$sql)){
}
else
{
echo "Error:".mysqli_error($conn);
}
unset($_POST['update']);
header("Location: formoperations.php");

}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>

	<h1>Form</h1>

	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

		<!-- Insertion -->
		<h2>Insertion</h2>
		Employee Name:<input type="text" name="name"><br>
		Employee Address:<input type="text" name="address"><br>
		Employee Salary:<input type="text" name="salary"><br>
		<button type="submit" name="insert">Insert</button>
		<br><br>

		<!-- Deletion -->
		<h2>Deletion</h2>
		<input type="text" name="maxsal"><br>
		<button type="submit" name="delete">Delete</button><br><br>
	
		<!-- Updation -->
		<h2>Updation</h2>
		Employee ID<input type="text" name="id"><br>
		New salary:<input type="text" name="newsalary"><br>
		<button type="submit" name="update">Update</button><br><br>

	</form>

	<h2>Records</h2>
	<?php 

				if(mysqli_num_rows($rslt)>0){

					?>
					<table>

						<tr>
							<th>id</th>
							<th>name</th>
							<th>address</th>
							<th>salary</th>
						</tr>
					<?php

					while($row = mysqli_fetch_assoc($rslt)){

						?>
						
						<tr>
							<td><?php echo $row['emp_id'] ?></td>
							<td><?php echo $row['emp_name'] ?></td>
							<td><?php echo $row['emp_add'] ?></td>
							<td><?php echo $row['emp_salary'] ?></td>
						</tr>
						<?php
					}
					?>
					</table>
					<?php
				}
				else{

					echo "There are no records";
				}
	?>
</body>
</html>
