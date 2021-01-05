<?php
//header
header('content-type:application/json');
//include
include('db.php');
include('security.php');
//inputs
$name = @$_POST['name'];
$email = @$_POST['email'];
$class = @$_POST['class'];
if(empty($name) || empty($email) || empty($class)) {
	
	$output= ['success'=>false,'message'=>'All Field Are Required!!!'];
	echo json_encode($output);
	die();
}
//logic
try {
	$stm = $pdo->prepare('CALL insertStudent(?, ?, ?)');
	$stm->execute(["$name","$email","$class"]);
	$response = ['sucess'=>true,'message'=>'Data is Inserted!!!','data'=>null];
} catch (PDOException $e) {
	$response = ['sucess'=>false,'message'=>$e->getMessage(),'data'=>null];
}
$json = json_encode($response);
echo $json;
?>


