<html>
	<head>
		
		<title>밥바바밥</title>
	</head>
	<body>
		<h1>이게 밥이냐</h1>
<?php
$file = './dat.txt';
$img_src = file_get_contents($file);
echo "<img src=$img_src>";
?>	
	</body>
</html>
