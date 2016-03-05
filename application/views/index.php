<?php 
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
		<title>Red Belt2</title>
	     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css">
	</head>
<!--Start of Body-->
<body id="index_body">
<h1 id="index_h1">Please <span id="blue">login</span> or <span id="purple">register</span></h1>

<div id="register">
<form method="post" action="/main/register">
    <input type="hidden" name="action" value="register">
    <label>Name:</label>
      <input type="text" name="name" id="name" placeholder="name">
    <label>Alias:</label>
      <input type="text" name="alias" id="alias" placeholder="alias">
    <label>Email:</label>
      <input type="text" name="email" id="email" placeholder="email">
    <label>Password:</label>
      <input type="password" name="password" id="password" placeholder="password">
    <label>Confirm PW:</label>
      <input  type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
    <label>Date of Birth:</label>
      <input type="date" name="date_of_birth">
    <input id="reg_btn" type="submit" value="Register">
</form>
</div>

<div id="login">
<form method="post" action="/main/login">
    <input type="hidden" name="action" value="login">
    <label>Email:</label>
    <input type="text" name="email" placeholder="email">
    <label>Password:</label>
    <input type="password" name="password" placeholder="password">
	<input id="login_btn" type="submit" value="Login">
</form>
</div>
<div class="flash">
  <?php print_r($this->session->flashdata('error'));
// if ($this->session->flashdata('error') != ''): 
//     echo $this->session->flashdata('error'); 
//   endif;
  ?>
  </div>
<form method="post" action="/main/reset"><input id="index_reset_button" type="submit" value="reset"></form>
</body>

</html>