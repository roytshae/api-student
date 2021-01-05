<?php 
//header
header('content-type:application/json');
//include
include('db.php');
include('security.php');
//query
if(empty($id)) {
	$query = "CALL GetAllStudents";
} 
$stm =  $pdo->query($query);

$stm->setFetchMode(PDO::FETCH_ASSOC);

$arr= [];
while($result = $stm->fetch()) {
	array_push($arr,$result);
}

	$response = ['sucess'=>true,'message'=>'Fetched Sucessfully','data'=>$arr];

$json = json_encode($response);
echo $json;
 
?>