<?php 
//header
header('content-type:application/json');
//include
include('db.php');
include('security.php');
//inputs
$id = @$_GET['id'];

 //query

	$query = "CALL GetStudentById('$id')";

$stm =  $pdo->query($query);

$stm->setFetchMode(PDO::FETCH_ASSOC);

$arr= [];
while($result = $stm->fetch()) {
	array_push($arr,$result);
}

	$response = ['sucess'=>true,'message'=>(count($arr) == 0) ? 'Data is Empty!!!' : 'Fetched Sucessfully','data'=>(count($arr) == 0) ? null : $arr[0]];

$json = json_encode($response);
echo $json;

?>