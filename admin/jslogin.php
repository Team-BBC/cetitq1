<?php
session_start();

//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db_user = 'root';
$db_pass = '';
$db_name = "hojastq";

$db = new PDO('mysql:host=localhost;dbname='. $db_name . ';charset=utf8', $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$username, $password]);

if($result){
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		$_SESSION['userlogin'] = $user;
		echo "1";
	}else{
		echo "wrong user or password";
	}
}else{
	echo "There were errors conecting to database";
}



/*$user = $arr;
if($mysqli->affected_rows > 0){
	$_SESSION['userlogin'] = $user;
	echo "1";
}else{
	echo "There were errors conecting to database";
}*/