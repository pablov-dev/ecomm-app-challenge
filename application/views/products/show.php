<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detalles del producto</title>
</head>

<body>
	<?php
	echo 'id' . $product->id . '<br>';
	echo 'title' . $product->title . '<br>';
	echo 'price' . $product->price . '<br>';
	echo 'created_at' . $product->created_at . '<br>';
	?>
</body>

</html>