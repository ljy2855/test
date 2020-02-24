<?php
if(!isset($_SESSION))
{
	session_start();
}

if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_pw'])) {
	echo "<meta http-equiv='refresh' content='0;url=login.html'>";
	exit;
}

echo "<meta http-equiv='refresh' content='0;url=main.html'>";

