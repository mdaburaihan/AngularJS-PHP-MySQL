<?php
//update data
$connect = mysqli_connect("localhost","root","","angularjs_test");

$data = json_decode(file_get_contents("php://input"));

if(count($data)>0)
{
	$user_id = mysqli_real_escape_string($connect,$data->user_id);
	$name = mysqli_real_escape_string($connect,$data->name);
	$email = mysqli_real_escape_string($connect,$data->email);

	$query = "UPDATE users SET name='$name',email='$email' WHERE user_id=$user_id";

	if(mysqli_query($connect,$query))
	{
		echo "Data updated successfully";
	}
	else
	{
		echo "Data not updated. Error occured.";
	}
}
?>