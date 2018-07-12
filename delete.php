<?php
//delete data
$connect = mysqli_connect("localhost","root","","angularjs_test");

$data = json_decode(file_get_contents("php://input"));

if(count($data)>0)
{
	$user_id = mysqli_real_escape_string($connect,$data->user_id);

	$query = "DELETE FROM users WHERE user_id=$user_id";

	if(mysqli_query($connect,$query))
	{
		echo "Data deleted successfully";
	}
	else
	{
		echo "Data not deleted. Error occured.";
	}
}
?>