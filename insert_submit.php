<?php
//insert data
$connect = mysqli_connect("localhost","root","","angularjs_test");

$form_data = json_decode(file_get_contents("php://input"));

$resdata = array();
$error = array();

if(empty($form_data->name))
{
	$error['name'] = "Name is required";
}

if(empty($form_data->emailid))
{
	$error['email'] = "Email is required";
}

if(!empty($error))
{
	$resdata['error'] = $error;
}
else
{
	$name = mysqli_real_escape_string($connect,$form_data->name);
	$email = mysqli_real_escape_string($connect,$form_data->emailid);

	$query = "INSERT INTO users(name,email) VALUES('$name','$email')";

	if(mysqli_query($connect,$query))
	{
		$resdata['message'] = "Data inserted successfully";
	}
	else
	{
		$resdata['message'] = "Data not inserted. Error occured.";
	}
}

echo json_encode($resdata);
?>