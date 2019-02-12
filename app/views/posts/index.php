<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Posts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
	<script src="main.js"></script>
</head>
<body>

	<ul>
		<?php foreach ($posts as $post): ?>
			<h2><?php echo htmlspecialchars($post['title']); ?></h2>
			<p><?php echo htmlspecialchars($post['content']); ?></p>
		<?php endforeach; ?>
	</ul>

	<p>
		<?php
			date_default_timezone_set('Asia/Tokyo');
			echo '<br />';
			echo '<br />';
			echo date_default_timezone_get();
			echo '<br />';
			echo date('D, d M Y');
			echo '<br />';
			echo date('h:i:s a');

			echo '<br />';
			echo '<br />';
			echo date_default_timezone_get();
			date_default_timezone_set('Asia/Jakarta');
			echo '<br />';
			// Asia/Jakarta
			echo date_default_timezone_get();
			echo '<br />';
			// Mon, 31 Dec 2018
			echo date('D, d M Y');
			echo '<br />';
			// 09:19:55 am
			echo date('h:i:s a');
			echo '<br />';
			// Asia/Jakarta +07:00
			echo date('e P');
		?>
	</p>

</body>
</html>