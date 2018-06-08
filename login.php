<?php 
	require 'db.php';

	$data = $_POST;
	if ( isset($data['do_login']) ) {
		$user = R::findOne('users', 'email = ?', array($data['email']));
		if ( $user ) {
			//логин существует
			if ( password_verify($data['password'], $user->password) ) {
				//если пароль совпадает, то нужно авторизовать пользователя
				$_SESSION['logged_user'] = $user;
				echo '<div style="color: green;font-size: 18px;text-align: center;">Ви авторизовані!<br/> Можете перейти на <a href="/">головну</a> сторінку.</div><hr>';
			} else {
				$errors[] = 'Невірно введено пароль!';
			}
		} else {
			$errors[] = 'Користувач з таким логіном не знайдено!';
		}
		
		if ( ! empty($errors) ) {
			//выводим ошибки авторизации
			echo '<div id="errors" style="color:red;text-align: center;">' .array_shift($errors). '</div><hr>';
		}
	}

		if ( isset($data['do_login_head']) ) {
		$user = R::findOne('heads', 'email = ?', array($data['email']));
		if ( $user ) {
			//логин существует
			if ( password_verify($data['password'], $user->password) ) {
				//если пароль совпадает, то нужно авторизовать пользователя
				$_SESSION['logged_user'] = $user;
				echo '<div style="color: green;font-size: 18px;text-align: center;">Ви авторизовані!<br/> Можете перейти на <a href="/">головну</a> сторінку.</div><hr>';
			} else {
				$errors[] = 'Невірно введено пароль!';
			}
		} else {
			$errors[] = 'Користувач з таким логіном не знайдено!';
		}
		
		if ( ! empty($errors) ) {
			//выводим ошибки авторизации
			echo '<div id="errors" style="color:red;text-align: center;">' .array_shift($errors). '</div><hr>';
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<p class="text">Натисніть <button id="toggle" class="other-auth__btn">Інша авторизація</button> якщо вам потрібно авторизуватися як керівник гуртка/звичайний користувач</p>

	<form action="login.php" method="POST" class="login-form">
		<h2 class="login-title">Авторизація для учня</h2>
		<strong>Email</strong>
		<input type="email" class="login-input" name="email" value="<?php echo @$data['email']; ?>"><br/>

		<strong>Пароль</strong>
		<input type="password" class="login-input" name="password" value="<?php echo @$data['password']; ?>"><br/>
		
		<div class="group-btn">
			<button type="submit" name="do_login" class="button">Вхід</button>
			<a href="index.php" class="link">Назад</a>
		</div>
	</form>

	<form action="login.php" method="POST" class="login-form" style="display: none;">
		<h2 class="login-title">Авторизація для керівника гуртка</h2>
		<strong>Email</strong>
		<input type="email" class="login-input" name="email" value="<?php echo @$data['email']; ?>"><br/>

		<strong>Пароль</strong>
		<input type="password" class="login-input" name="password" value="<?php echo @$data['password']; ?>"><br/>

		<div class="group-btn">
			<button type="submit" name="do_login_head" class="button">Вхід</button>
			<a href="index.php" class="link">Назад</a>
		</div>
	</form>

	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script>
		$( "#toggle" ).click(function() {
		  $( "form" ).toggle();
		});
	</script>	
</body>
</html>