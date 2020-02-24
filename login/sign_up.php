<?php
$id = $_POST['id'];
$pw = $_POST['pw'];
$pwc = $_POST['pwc'];
$name = $_POST['name'];

$mysql_hostname = 'localhost';
$mysql_username = 'cocopam';
$mysql_password = 'wlsdyd12';
$mysql_database = 'test';
$mysql_port = '3306';
$mysql_charset = 'utf8';

if($pw != $pwc)
{
	echo "비밀번호 재입력이 틀렸음";
	echo "<a href=sign_up.html>back page</a>";
	exit();

}

if($id == NULL || $pw == NULL || $name == NULL)
{
	echo "빈칸을 채워주세요";
	echo "<a href=sign_up.html>back page</a>";
	exit();

}
 
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
$check = $connect->query("SELECT * from usr WHERE id='$id'");
$result = $check->fetch();
if($result != null)
{
	echo "아이디 중복";
	echo "<a href=sign_up.html>back page</a>";
	exit();
}
$connect = new PDO( $dsn, $mysql_username, $mysql_password);
// injection 주의
$stmt = $connect->prepare("INSERT INTO usr (id, pw, name) VALUES (:id,:pw,:name)");
$stmt->bindParam(':id',$id);
$stmt->bindParam(':pw',$pw);
$stmt->bindParam('name',$name);

$$id = $_POST['id'];
$pw = $_POST['pw'];
$name = $_POST['name'];


$stmt->execute();

header("Location: login.html");


?>
