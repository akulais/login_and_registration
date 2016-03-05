<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<title>Login</title>
	     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
	</head>
<body id="login_body">
	<h1 id="login_body_h1">Welcome, <?= $user['name'] ?>!</h1>
<div id="display_all">
<table>
	<thead>
		<tr>
			<td>Name</td>
			<td>Alias</td>
			<td>Email address</td>
			<td>Date of Birth</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($all_users as $all) { ?>
		<tr>
			<td><?= $all['name'] ?></td>
			<td><?= $all['alias'] ?></td>
			<td><?= $all['email'] ?></td>
			<td><?= $all['date_of_birth'] ?></td>
			<td>
				<a id="delete_entry" href="/main/delete/<?= $all['id'] ?>" method='post' value="delete">delete</a>
			</td>
			<?php } ?>
		</tr>
	</tbody>
</table>
</div>
	<form method="post" action="/main/reset">
	<input id="log_out_btn" type="submit" value="log out"></form>
</body>