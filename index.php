<?php 
	require 'db.php';
  $circle = R::findAll('circle', 'ORDER BY name_circle ASC');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Index</title>
	<link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <style>.df{display: flex;flex-direction: column;align-items: center;}</style>
</head>
<body>
	<!-- header -->
	<header class="header"></header>
	
	<!-- content -->
	<div class="wrap">
    <section class="content">
      <h3 class="content__title">Список гуртків Кропивницького</h3>
      <ul class="list">
        <li class="list-item">         
          <?php foreach ($circle as $item) { ?>
          <?php //echo $item->name_circle .'<br/>'; ?>
          <form method="post" action="circle.php" class="list-item__link">
             <input type="hidden" name="data" value="<?php echo $item->id ?>">
             <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $item->name_circle ?></button>
           </form>
          <?php }; ?>         
        </li>
      </ul>
    </section>

    <section class="sbar">
    	<?php if ( isset ($_SESSION['logged_user']) ) : ?>
        <div class="sbar-block">
      		<h6 class="sbar__title">
            Привіт, <?php echo $_SESSION['logged_user']->first_name; 
            ?>!
          </h6> 
          <?php 
           if ($_SESSION['logged_user']->role == 3) {
            echo '<a style="margin: 40px auto;" href="admin.php"> Панель адміністратора </a>';
          }
           if ($_SESSION['logged_user']->role == 1) {
            echo '<a style="margin: 40px auto;" href="head_circle.php"> Кабінет керівника </a>';
          }
          if ($_SESSION['logged_user']->role == 2) {
            echo '<a style="margin: 40px auto;" href="user.php"> Кабінет учня </a>';
          }
          ?>   		
      		<a class="sbar__link" href="logout.php">Вийти</a>
        </div>
    	<?php else : ?>
        <h6 class="sbar__title">Ви не авторизовані!</h6>
        <div class="sbar-block">
          <a class="sbar-block__link" href="/login.php">Авторизація</a>
          <a class="sbar-block__link" href="/signup.php">Реєстрація</a>
        </div>    		
    	<?php endif; ?>
     
      <div style="margin-top: 150px;"> <span style="cursor: pointer;cursor: pointer;display: flex;justify-content: center;border: 1px solid;border-radius: 3px;padding: 3px;" id="showpanel">  Увійти в адмінпанель </span>
        <form action="index.php" method="post" id="admin_form" class="df" style="display: none;">
          <div style="margin: 5px;">Логін</div>
          <input type="text" style="margin-bottom: 5px;" name="login">

          <div style="margin: 5px;">Пароль</div>
          <input type="password" style="margin-bottom: 5px;" name="password" >
          <button type="submit" name="login_admin" style="margin: 0 auto;">Вхід</button>
        </form>
      </div>
    </section>
  </div>
  <?php 
  
    if (isset($_POST['login_admin'])) {
      $user = R::findOne('admin', 'email = ?', [$_POST['login']]);
      if ($user) {
        if (password_verify($_POST['password'], $user->password)) {
          $_SESSION['logged_user'] = $user;
          echo '<div style="position: absolute;top:0;left:45%;color:green;font-size:18px;">Вхід виконано!</div>';
        } else {
          $errors[] = "Пароль невірний!";
        }
      } else {
        $errors[] = "Логін не знайдено";
      }
      if ( ! empty($errors) ) {
      //выводим ошибки авторизации
      echo '<div id="errors" style="position: absolute;top:0;left:45%;color:red;font-size:18px;">' .array_shift($errors). '</div>';
    }
 ?> 
 <script> 
  function func() {
    window.location.href = 'index.php';
  }
  setTimeout(func, 2000); 
</script> 
<?php } ?>
	<!-- scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script >
    $('#showpanel').click(function () {
      $('#admin_form').toggle('slow');
    })
  </script>
</body>
</html>
