<?php 

$headers = apache_request_headers();
$token = @$headers['Authorization'];
if(strpos($token,'Bearer') !== false) {
	$data = explode( ' ',$token);
	$jwt_token = $data[1];
} else {
	$output= ['success'=>false,'message'=>'Unauthorize Access!!!'];
	echo json_encode($output);
	die();
}
$tokenParts = explode('.', $jwt_token);
$header = base64_decode($tokenParts[0]);
$payload = base64_decode($tokenParts[1]);
$payload_obj = json_decode($payload,true);

$udetail = new JWT();
$server_token = $udetail->createtoken_with_username($pdo,$payload_obj['username']);
if($jwt_token !==  $server_token) {
	
	$output= ['success'=>false,'message'=>'Unauthorize Access!!!'];
	echo json_encode($output);
	die();
} 

?>