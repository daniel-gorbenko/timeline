<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $meta['title']; ?></title>
	<meta name="description" content="<?php echo $meta['description']; ?>">
</head>
<body>
	<?php echo $attributes['year']; ?>
	<?php echo $attributes['month']; ?>
	<?php echo $attributes['day']; ?>
	<?php echo $attributes['name']; ?>

	<?php echo $content; ?>
</body>
</html>