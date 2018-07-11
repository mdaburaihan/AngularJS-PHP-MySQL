<?php
//insert data
$connect = mysqli_connect("localhost","root","","angularjs_test");

$data = json_decode(file_get_contents("php://input"));

if(count($data)>0)
{
	$name = mysqli_real_escape_string($connect,$data->name);
	$email = mysqli_real_escape_string($connect,$data->email);

	$query = "INSERT INTO users(name,email) VALUES('$name','$email')";

	if(mysqli_query($connect,$query))
	{
		echo "Data inserted successfully";
	}
	else
	{
		echo "Data not inserted. Error occured.";
	}
}
?>