<?php

$mysql_hostname = 'localhost';
$mysql_username = 'cocopam';
$mysql_password = 'wlsdyd12';
$mysql_database = 'test';
$mysql_port = '3306';
$mysql_charset = 'utf8';

$dsn = 'mysql:host='.$mysql_hostname.';dbname='.$mysql_database.';port='.$mysql_port.';charset='.$mysql_charset;

try
{
	$connect = new PDO( $dsn, $mysql_username, $mysql_password);
}
catch (PDOException $e)
{
	echo 'connect fail : '. $e->getMessage().'';
	return false;
}

$id = $_POST['id'];
$pw = $_POST['pw'];

$check = $connect->query("SELECT * FROM usr where id='$id'");
$row = $check->fetch();

if($row['id'] == $id)
{	
	if($row['pw'] == $pw)
	{
		$_SESSION['user_id'] = $id;
		$_SESSION['user_pw'] = $pw;
		$_SESSION['user_name'] = $row['name'];
		//echo $_SESSION['user_pw'];
		if(isset($_SESSION['user_id']))
		{
			header('Location: ./main.php');
		}
		else
		{
			echo "세션 저장 실패";
		}
	}
	else
	{
		echo "wrong pw";
	}

}
else
{
	echo "can't find id";




}



?>
