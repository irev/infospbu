<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login Admin</title>
<meta name="description" content="">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">

<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" href="assets/css/style-login.css">
</head>
<body class='login_body'>
	<div class="wrap">
		<h2>Login Admin</h2>
		<h4>Masukkan Username dan Password Anda</h4>
		<form action= "admin/cek.php"  method="post">
		<div class="login">
			<div class="email">
				<label for="user">Username</label><div class="email-input"><div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input type="text" id="user" name="user"></div></div>
			</div>
			<div class="pw">
				<label for="pw">Password</label><div class="pw-input"><div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span><input type="password" id="pw" name="pw"></div></div>
			</div>			
		</div>
		<div class="submit">
			
			<button class="btn btn-red5">Login</button>
		</div>
		</form>
	</div>
<script src="asset/js/jquery.js"></script>
</body>
</html>