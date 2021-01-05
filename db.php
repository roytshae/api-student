 <?php
//$mysqli = new mysqli("localhost","root","","db_api");



// Check connection
/*if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}*/
$dsn = "mysql:host=localhost;dbname=db_api";
$user = "root";
$passwd = "";

$pdo = new PDO($dsn, $user, $passwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

include('jwt.php');
?> 