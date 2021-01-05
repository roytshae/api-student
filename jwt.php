<?php 
class JWT {

function base64UrlEncode($text)
{
   return str_replace(
       ['+', '/', '='],
       ['-', '_', ''],
       base64_encode($text)
   );
}

function getToken($payload, $secret) {

$header = json_encode([
   'typ' => 'JWT',
   'alg' => 'HS256'
]);

$payload = json_encode($payload);

// Create the token payload
// $payload = json_encode([
//     'user_id' => 1,
//     'role' => 'rohit',
//     'exp' => 1593828222
// ]);

// Encode Header
$base64UrlHeader = $this->base64UrlEncode($header);

// Encode Payload
$base64UrlPayload = $this->base64UrlEncode($payload);

// Create Signature Hash
$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);

// Encode Signature to Base64Url String
$base64UrlSignature = $this->base64UrlEncode($signature);

// Create JWT
$jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

return $jwt;
}
function createtoken_with_username($pdo,$username) {
	$stm = $pdo->query("CALL getUserDetail('$username')");
		$stm->setFetchMode(PDO::FETCH_ASSOC);
		$result = $stm->fetch();
		return $this->getToken(['username'=>$result['username']],$result['password']);


}
}


?>