<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $_ENV['ST_NAME'] ?></title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<style>
		*{
			margin: 0;
			padding: 0;
			font-family: 'Open Sans', sans-serif;
		}
		.wrapper{
			min-height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			background: #f4594e;
			flex-direction: column;
		}
		.wrapper h2, h3{
			display: block;
			text-align: center;
			color: white;
		}
		strong{
			font-size: 25px;
    		color: blueviolet;
		}
	</style>
	
	<div class="wrapper">
		<h2><?= $error ?></h2>
		<br>
		<?= $message ?>
	</div>

</body>
</html>