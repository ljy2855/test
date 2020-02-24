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
	echo 'coonect fail : '. $e->getMessage().'';
	return false;
}

		$stmt = $connect->prepare("INSERT INTO test_table (id,password) VALUES (:id, :password)");
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':password',$password);

        $id = $_POST['id'];
		$password = $_POST['password'];
        $stmt->execute();
        #header("Location: list.php");
	
	
?>
