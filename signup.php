<?php 
	require 'db.php';

	$data = $_POST;

	//если кликнули на button.
	if ( isset($data['do_signup']) ) {
    // проверка формы на пустоту полей
		$errors = array();
		if ( trim($data['first_name']) == '' ) 					{$errors[] = 'Введіть ім\'я';}
		if ( trim($data['second_name']) == '' )					{$errors[] = 'Введіть прізвище';}
		if ( trim($data['last_name']) == '' ) 					{$errors[] = 'Введіть по батькові';}
		if ( trim($data['certificate']) == '' )					{$errors[] = 'Введіть свідоцтво про народження';}
		if ( trim($data['email']) == '' )								{$errors[] = 'Введіть Email';}
		if ( $data['password'] == '' ) 									{$errors[] = 'Введіть пароль';}
		if ( $data['password_2'] != $data['password'] )	{$errors[] = 'Повторний пароль введений невірно!';}

		//проверка на существование одинакового certificate
		if ( R::count('users', "certificate = ?", array($data['certificate'])) > 0) {
			$errors[] = 'Користувач з таким свідоцтвом вже існує!';//<div style="position: absolute;top:50%;left:45%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);"></div><hr>
		}    
    //проверка на существование одинакового email
		if ( R::count('users', "email = ?", array($data['email'])) > 0) {
			$errors[] = 'Користувач з таким email вже існує!';//<div style="position: absolute;top:50%;left:45%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);"></div><hr>
		}

		if ( empty($errors) )	{
			//ошибок нет, теперь регистрируем
			$user = R::dispense('users');
			$user->first_name = $data['first_name'];
			$user->second_name = $data['second_name'];
			$user->last_name = $data['last_name'];
			$user->certificate = $data['certificate'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			$user->school = $data['school'];
			// $user->phone = $data['phone'];
			/*$user->address = $data['address'];
			$user->social = $data['social'];*/
			$name = $data['first_name']; $name = htmlspecialchars($name); $name = urldecode($name);
			$surname = $data['second_name']; $surname = htmlspecialchars($surname); $surname = urldecode($surname);
			$lastName = $data['last_name']; $lastName = htmlspecialchars($lastName); $lastName = urldecode($lastName);
			$phone = $data['phone']; $phone = htmlspecialchars($phone); $phone = urldecode($phone);
			$email = $data['email']; $email = htmlspecialchars($email); $email = urldecode($email);
			$pass = $data['password']; $pass = htmlspecialchars($pass); $pass = urldecode($pass); 
			mail("нужный нам е-майл", "New User", "Name:" . ' ' . $name .  "\r\nSurname: " . ' ' . $surname . "\r\nLast Name: " . ' ' . $lastName . "\r\nTelephone:" . ' ' . $phone . "\r\nE-mail:" . ' ' . $email, "From: e-mail сайта \r\n");
			mail("$email", "Registration info", "Login: " . $email  . "\r\nPassword: " . $pass, "From: e-mail сайта \r\n");
			R::store($user);
			echo '<div style="position: absolute;top:50%;left:45%;color:green;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Ви успішно зареєстровані!</div><hr>';
		} else {
			echo '<div id="errors" style="position: absolute;top:50%;left:45%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">' .array_shift($errors). '</div><hr>';
		} ?> 
		<script> 

    function func() {
      window.location.href = 'signup.php';
    }
    setTimeout(func, 2000); 
  </script>
  <?php
	}

	// регистрация для руковаодителя кружка
	if ( isset($data['do_signup_2']) ) {
    // проверка формы на пустоту полей
		$errors = array();
		if ( trim($data['first_name']) == '' ) 					{$errors[] = 'Введіть ім\'я';}
		if ( trim($data['second_name']) == '' )					{$errors[] = 'Введіть прізвище';}
		if ( trim($data['last_name']) == '' ) 					{$errors[] = 'Введіть по батькові';}
		if ( trim($data['email']) == '' )								{$errors[] = 'Введіть Email';}
		if ( $data['password'] == '' ) 									{$errors[] = 'Введіть пароль';}
		if ( $data['password_2'] != $data['password'] )	{$errors[] = 'Повторний пароль введений невірно!';}

    //проверка на существование одинакового email
		if ( R::count('heads', "email = ?", array($data['email'])) > 0) {
			$errors[] = 'Користувач з таким email вже існує!';//<div style="position: absolute;top:50%;left:45%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);"></div>
		}

		if ( empty($errors) )	{
			//ошибок нет, теперь регистрируем
			$user = R::dispense('heads');
			$user->first_name = $data['first_name'];
			$user->second_name = $data['second_name'];
			$user->last_name = $data['last_name'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		/*	$user->work_place = $data['work_place'];*/
			//$user->phone = $data['phone'];
			/*$user->address = $data['address'];
			$user->social = $data['social'];*/
			// $user->ownItemList[] = $circle;
			$email = $data['email']; $email = htmlspecialchars($email); $email = urldecode($email);
			$pass = $data['password']; $pass = htmlspecialchars($pass); $pass = urldecode($pass); 
			mail("$email", "Registration info", "Login: " . $email  . "\r\nPassword: " . $pass, "From: e-mail сайта \r\n");
			R::store($user);
			echo '<div style="position: absolute;top:50%;left:30%;color:green;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Ви успішно зареєстровані! Можете перейти на <a href="/">головну</a> сторінку.</div><hr>';
		} else {
			echo '<div id="errors" style="position: absolute;top:50%;left:45%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">' .array_shift($errors). '</div><hr>';
		} ?> 
		 <script> 

    function func() {
      window.location.href = 'signup.php';
    }
    setTimeout(func, 5000); 
  </script> 
	<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Signup</title>
	<link rel="stylesheet" href="css/signup.css">
</head>
<body>
	<div style="width: 50%; margin: 0 auto; text-align: center;">	
		<button type="submit" id="toggle" class="tog-btn">Реєстрація Керівника гуртка</button>
		<button type="submit" id="toggle2" class="tog-btn">Реєстрація Учня</button>
	</div>

	<form action="/signup.php" class="forms" method="POST">
		<h2>Реєстрація на сайті</h2>
		<p><span>* </span>- поле обов'язкове для заповнення</p>
		
		<h5><strong>Ваше прізвище </strong><span>*</span></h5>
		<input type="text" name="second_name" value="<?php echo @$data['second_name']; ?>"><br/>

		<h5><strong>Ваше імя </strong><span>*</span></h5>
		<input type="text" name="first_name" value="<?php echo @$data['first_name']; ?>"><br/>

		<h5><strong>Ваше по батькові</strong><span>*</span></h5>
		<input type="text" name="last_name" value="<?php echo @$data['last_name']; ?>"><br/>

		<h5><strong>Ваше свідоцтво про народження</strong><span>*</span></h5>
		<input type="text" name="certificate" class="certificate" <?php echo @$data['certificate']; ?>><br/>

		<h5><strong>Ваша школа</strong><span>*</span></h5>
		<select name="school" id="" class="school-select">
			<option value="НВО № 1">НВО № 1</option>
			<option value="НВО № 2">НВО № 2</option>
			<option value="НВО № 3">НВО № 3</option>
			<option value="НВО № 4">НВО № 4</option>
			<option value="НВО ім. Т. Шевченка">НВО ім. Т. Шевченка</option>
			<option value="НВО № 6">НВО № 6</option>
			<option value="НВО № 7">НВО № 7</option>
			<option value="НВО № 8">НВО № 8</option>
			<option value="Гімназія № 9">Гімназія № 9</option>
			<option value="НВО № 10">НВО № 10</option>
			<option value="НВК „Кір. колегіум”">НВК „Кір. колегіум”</option>
			<option value="ЗОШ № 12">ЗОШ № 12</option>
			<option value="СЗОШ № 14">СЗОШ № 14</option>
			<option value="НВО № 15">НВО № 15</option>
			<option value="НВО № 16">НВО № 16</option>
			<option value="НВО № 17">НВО № 17</option>
			<option value="НВО № 18">НВО № 18</option>
			<option value="НВО № 19">НВО № 19</option>
			<option value="НВО № 20">НВО № 20</option>
			<option value="НВО № 21">НВО № 21</option>
			<option value="НВО № 22">НВО № 22</option>
			<option value="НВО № 23">НВО № 23</option>
			<option value="НВО № 24">НВО № 24</option>
			<option value="НВО № 25">НВО № 25</option>
			<option value="НВО № 26">НВО № 26</option>
			<option value="НВО № 29">НВО № 29</option>
			<option value="НВО № 30">НВО № 30</option>
			<option value="НВО № 31">НВО № 31</option>
			<option value="НВО № 32">НВО № 32</option>
			<option value="НВО № 33">НВО № 33</option>
			<option value="НВО № 34">НВО № 34</option>
			<option value="НВО № 35">НВО № 35</option>
			<option value="НВО № 36">НВО № 36</option>
			<option value="НВО № 37">НВО № 37</option>
			<option value="НВО “ЗОШ-інтернат”">НВО “ЗОШ-інтернат”</option>
			<option value="СпецЗОШ № 1">СпецЗОШ № 1</option>
			<option value="СпецЗОШ № 3">СпецЗОШ № 3</option>
			<option value="НВО “Вікторія-П”">НВО “Вікторія-П”</option>
			<option value="НВО “Мрія”">НВО “Мрія”</option>
			<option value="Гімназія НТН">Гімназія НТН</option>
			<option value="Педагогічний ліцей">Педагогічний ліцей</option>
			<option value="БДЮТ">БДЮТ</option>
			<option value="„Каскад”">„Каскад”</option>
			<option value="СЮТ">СЮТ</option>
			<option value="Школа естетич. вихов. „В гостях у казки”">Школа естетич. вихов. „В гостях у казки”</option>
			<option value="Центр „Юність”">Центр „Юність”</option>
		</select>

		<h5><strong>Ваш Email</strong><span>*</span></h5>
		<input type="email" name="email" value="<?php echo @$data['email']; ?>"><br/>

		<h5><strong>Ваш телефон</strong><span>*</span></h5>
		<input type="text" name="phone" class="telephone" value="<?php echo @$data['email']; ?>"><br/>

		<h5><strong>Ваш пароль</strong><span>*</span></h5>
		<input type="password" name="password" maxlength="25" value="<?php echo @$data['password']; ?>"><br/>

		<h5><strong>Повтор пароля</strong><span>*</span></h5>
		<input type="password" name="password_2" maxlength="25" value="<?php echo @$data['password_2']; ?>"><br/>

		<div class="group-btn">
			<button type="submit" name="do_signup" class="button">Реєстрація</button>
			<a href="index.php" class="link">На головну</a>
		</div>
	</form>
	
	<!-- FORM SIGN UP FOR HEAD CIRCLE -->
	<form action="/signup.php" class="forms2" id="hide_block" method="POST" style="display: none;">
		<h2 class="title">Реєстрація для керівника гуртка</h2>
		<p><span>* </span>- поле обов'язкове для заповнення</p>

		<strong>Ваше прізвище <span>*</span></strong>
		<input type="text" name="second_name" value="<?php echo @$data['second_name']; ?>"><br/>
		
		<strong>Ваше імя <span>*</span></strong>
		<input type="text" name="first_name" value="<?php echo @$data['first_name']; ?>"><br/>

		<strong>Ваше по батькові <span>*</span></strong>
		<input type="text" name="last_name" value="<?php echo @$data['last_name']; ?>"><br/>

		<strong>Ваш Email <span>*</span></strong>
		<input type="email" name="email" value="<?php echo @$data['email']; ?>"><br/>

		<strong>Ваш пароль <span>*</span></strong>
		<input type="password" name="password" value="<?php echo @$data['password']; ?>"><br/>

		<strong>Повтор пароля <span>*</span></strong>
		<input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>"><br/>
		
		<div class="group-btn">
			<button type="submit" name="do_signup_2" class="button">Реєстрація</button>
			<a href="index.php" class="link">На головну</a>
		</div>
	</form>

	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script>
		$( "#toggle" ).click(function() {
		  $( ".forms2" ).show();
		  $( ".forms" ).hide();
		});
		$( "#toggle2" ).click(function() {
		  $( ".forms" ).show();
		  $( ".forms2" ).hide();
		});
	</script>	
	<script src="js/jquery.maskedinput.min.js"></script>
	<script>
		$.mask.definitions['a']='[А-ЯІЇ]';
		$(".certificate").mask("I-aa 999999");
		$('.telephone').mask("+380(99) 999-99-99");
	</script>
</body>
</html>
