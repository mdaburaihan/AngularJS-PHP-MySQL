<?php
//insert data
$connect = mysqli_connect("localhost","root","","angularjs_test");

$query = "SELECT * FROM users";

$result = mysqli_query($connect,$query);

$output = array();
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$output[] = $row;
	}

	echo json_encode($output);
	/*echo "<pre>";
	print_r($output);
	echo "</pre>";*/
}
?>