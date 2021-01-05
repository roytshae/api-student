<?php
//header
header('content-type:application/json');
//includes
include('db.php');
$username = @$_POST['username'];
$password = @$_POST['password'];
if(empty($username) || empty($password)) {
	//var_dump(http_response_code(401));
	$output= ['success'=>false,'message'=>'Please enter username and password'];
	echo json_encode($output);
	die();
}
$stm = $pdo->query("CALL Getuser('$username','$password')");
$stm->setFetchMode(PDO::FETCH_ASSOC);
$result = $stm->fetch();
$jwt = new JWT();
$token = $jwt->getToken(['username'=>$username], $password);

if($result['count'] == 1) {
	
   	$output= ['success'=>true,'data'=>['token'=>$token]];

} else {
	$output= ['success'=>false]; 
}
echo json_encode($output);
?>

