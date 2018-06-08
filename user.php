<?php 
require 'db.php';
$item = $_SESSION;
  foreach ($item as $key => $aa) {
    $role = $aa['role'];
  }
if ($role != 2) {
  header('Location: error.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>User</title>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
 <link rel="stylesheet" href="css/reset.css">
 <link rel="stylesheet" href="css/style.css">
 <style>
 .new_h3 {text-align: center;margin-bottom: 30px;} 
 .new_form {padding: 0 30px;}
 .new_form2 {padding: 0 30px;}
 .new_select {width: 100px;}
 .new_btn {margin-top: 50px;}
 .circle__title {font-weight: 600;line-height: 25px;}
 .circle-list {font-weight: 300;}
 
 .boss-block {
  display: flex;
  flex-direction: column;
  align-items: center;
  border: 2px solid;
  margin: 20px auto;
  padding: 10px;
  width: 25%;
}
.edit_password {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 20px auto;
  padding: 5px;
  border: 2px solid;
  width: 25%;
}
.editpasstitle {
  font-weight: 600;
  font-size: 20px;
}
.editpasslight {font-weight: 300;}
.but {
  cursor: pointer;
  border: 1px solid #000;
  background-color: #ccc;
  border-radius: 3px;
  padding: 4px 0px;
  margin-top: 5px;
  width: max-content;
}
</style>
</head>
<body>
	<!-- header -->
	<header class="header"></header>
	
	<!-- content -->
	<div class="wrap">
    <section class="content">
      <h3 class="content__title">
        <a href="index.php" class="get-back"><i class="fas fa-arrow-left back"></i></a>
        <?php
        echo $_SESSION['logged_user']->second_name . ' ' . $_SESSION['logged_user']->first_name . ' ' . $_SESSION['logged_user']->last_name ; 
        ?>
      </h3>
      <div class="" style="display: flex; justify-content: space-around;">
        <ul class="circle">
          <span class="circle__title">Прізвище</span>
          <li class="circle-list">
            <?php
            echo $_SESSION['logged_user']->second_name;
            ?>
          </li>

          <span class="circle__title">Ім'я</span>
          <li class="circle-list">
            <?php
            echo $_SESSION['logged_user']->first_name;
            ?>
          </li>

          <span class="circle__title">По-батькові</span>
          <li class="circle-list">
            <?php
            echo $_SESSION['logged_user']->last_name;
            ?>
          </li>

          <span class="circle__title">Свідоцтво</span>
          <li class="circle-list">
            <?php
            echo $_SESSION['logged_user']->certificate;
            ?>
          </li>


          <span class="circle__title">Гуртки, в яких я беру участь</span>
          <li class="circle-list">
            <?php
            $user_id = $_SESSION['logged_user']->id;
            $circles = R::findAll('circlepupils', 'pupils_id = ?', [$user_id]);
            $id_circles = [];
            $i = 0;
            foreach ($circles as $key => $item) {
              $id_circles[$i] = $item->circle_id;
              $i++;
            }
            $item_circle = R::loadAll('circle', $id_circles);
            $amount = count($item_circle);
            if ($amount == 0) {
             echo 'Відсутні...';
           } else {
             foreach ($item_circle as $key => $item) {
              echo $item['name_circle'] . '<br/>';
            } 
          }



          ?>
        </li>

        <span class="circle__title">E-mail</span>
        <li class="circle-list">
          <?php
          echo $_SESSION['logged_user']->email;
          ?>
        </li>

        <span class="circle__title">Школа </span>
        <li class="circle-list">
          <?php
          if ($_SESSION['logged_user']->school != '') {
            echo $_SESSION['logged_user']->school;
          } else {
            echo 'Додайте інформацію про школу...';
          }
          ?>
        </li>

        <span class="circle__title">Телефон</span>
        <li class="circle-list">
          <?php
          if ($_SESSION['logged_user']->phone != '') {
            echo $_SESSION['logged_user']->phone;
          } else {
            echo 'Додайте телефон...';
          }
          ?>
        </li>  

        <span class="circle__title">Адреса</span>
        <li class="circle-list">
          <?php
          if ($_SESSION['logged_user']->address != '') {
            echo $_SESSION['logged_user']->address; 
          } else {
            echo 'Додайте адресу...';
          }
          ?>
        </li>

        <span class="circle__title">Спільноти</span>
        <li class="circle-list">
          <?php
          if ($_SESSION['logged_user']->social != '') {
            echo $_SESSION['logged_user']->social;
          } else {
            echo 'Додайте спільноти...';
          }
          ?>
        </li> 
      </ul>
      
      <form action="user.php" class="new_form" method="post">
        <h2 style="margin: 15px 0; font-size: 18px;">  Редагування профілю</h2>
        <div class="items"> 
         <strong >Ваше ім'я</strong><br>
         <input type="text" name="first_name" value="<?php echo @$data['first_name']; ?>"><br/>
       </div>

       <div class="items"> 
         <strong >Ваше прізвище</strong><br>
         <input  type="text" name="second_name" value="<?php echo @$data['second_name']; ?>"><br/>
       </div>

       <div class="items">
         <strong>Ваше по-батькові</strong><br>
         <input type="text" name="last_name" value="<?php echo @$data['last_name']; ?>"><br/>
       </div>

       <div class="items">
        <strong>Ваш сертифікат</strong><br>
        <input type="text" class="certificate" name="certificate" value="<?php echo @$data['certificate']; ?>"><br/>
      </div>

      <div class="items">
        <strong>Ваш E-mail</strong><br>
        <input type="text" name="email" value="<?php echo @$data['email']; ?>"><br/>
      </div>

      <div class="items">
        <strong>Ваша школа</strong><br>
        <input type="text" name="school" value="<?php echo @$data['school']; ?>"><br/>
      </div>

      <div class="items">
        <strong>Ваш телефон</strong><br>
        <input class="telephone" type="text" name="phone"  value="<?php echo @$data['phone']; ?>"><br/>
      </div>

      <div class="items">
        <strong>Ваша адреса</strong><br>
        <input type="text" name="address" value="<?php echo @$data['address']; ?>"><br/>
      </div>

      <div class="items">
        <strong>Ваші спільноти</strong><br>
        <textarea type="text" name="social" style="max-width: 154px;min-width: 154px;min-height: 60px; max-height: 60px;" <?php echo @$data['social']; ?>> </textarea><br/>
      </div>
      <button type="submit" name="update" style="margin: 20px 0;    margin: 20px 0; border: 1px solid #212121; border-radius: 3px; text-transform: uppercase;  cursor: pointer;">Оновити інформацію</button>
    </form>
  </div>
</section>
</div>	
<?php 
if (isset($_POST['update'])) {
  if ( trim($_POST['first_name']) == '' && trim($_POST['second_name']) == '' && trim($_POST['last_name']) == '' && trim($_POST['certificate']) == '' && trim($_POST['email']) == '' && trim($_POST['school']) == '' && trim($_POST['phone']) == '' && trim($_POST['address']) == '' && trim($_POST['social']) == '') {
    echo '<div style="position: absolute;top:0;left:40%;color:red;font-size:18px;">Не введено ні одного поля</div>';
  } else {
  $id = $_SESSION['logged_user']->id;
  $item = R::load('users', $id);
  if ( trim($_POST['first_name']) != '' ) {
    $item->first_name = $_POST['first_name'];
  }
  if ( trim($_POST['second_name']) != '' ) {
    $item->second_name = $_POST['second_name'];
  }
  if ( trim($_POST['last_name']) != '' ) {
    $item->last_name = $_POST['last_name'];
  }
  if ( trim($_POST['certificate']) != '' ) {
    $item->certificate = $_POST['certificate'];
  }
  if ( trim($_POST['email']) != '' ) {
    $item->email = $_POST['email'];
  }
  if ( trim($_POST['school']) != '' ) {
    $item->school = $_POST['school'];
  }
  if ( trim($_POST['phone']) != '' ) {
    $item->phone = $_POST['phone'];
  }
  if ( trim($_POST['address']) != '' ) {
    $item->address = $_POST['address'];
  }
  if ( trim($_POST['social']) == '' ) {
    $item->social = $_POST['social'];
  }
  R::store($item);
  echo '<div style="position: absolute;top:0;left:40%;color:green;font-size:18px;"> Інформацію оновлено</div>';
  $_SESSION['logged_user'] = $item;} ?>

  <script> 

    function func() {
      window.location.href = 'user.php';
    }
    setTimeout(func, 2000); 
  </script> 
  <?php   } ?>

   <form action="user.php" method="post" name="edit_user_password" class="boss-block">
      <h2 class="editpasstitle">Зміна паролю</h2>
      
      <strong class="editpasslight">Новий пароль</strong>
      <input type="password" name="new_password"> 

      <strong class="editpasslight">Повтор пароля</strong>
      <input type="password" name="new_passwordConfirm"> 

      <button type="submit" class="but" name="update_user_password">Змінити пароль</button>
    </form>
    <?php 

    $id = $_SESSION['logged_user']->id;
      if (isset($_POST['update_user_password'])) {
         $userToUpdate = R::load('users', $id);
          if ( $_POST['new_passwordConfirm'] != $_POST['new_password'] ) {$errors[] = 'Повторний пароль введений невірно!';}
          if (empty($errors)) {
            $email = $_SESSION['logged_user']->email; $email = htmlspecialchars($email); $email = urldecode($email);
            $pass = $_POST['new_password']; $pass = htmlspecialchars($pass); $pass = urldecode($pass); 
             mail("$email", "Password Changed", "Login: " . $email  . "\r\nPassword: " . $pass, "From: e-mail сайта \r\n");
            $userToUpdate->password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

            

            R::store($userToUpdate);
            echo '<div class="a" style="position: absolute;top:0;left:30%;color:green;font-size:18px;"> Пароль змінено! Логін та новий пароль відправленно на ваш Email</div>';
            $_SESSION['logged_user'] = $userToUpdate;
          } else {
            echo '<div id="errors" style="position: absolute;top:0;left:40%;color:red;font-size:18px;">' .array_shift($errors). '</div>';
          }
      ?> 
      <script> 
            function func() {
              window.location.href = 'user.php';
            }
            setTimeout(func, 3000); 
          </script>
    <?php }
    ?>

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="js/jquery.maskedinput.min.js"></script>
  <script>
    $.mask.definitions['a']='[А-ЯІЇ]';  
    $(".certificate").mask("9-aa 999999");
    $(".telephone").mask("+380(99) 999-99-99");
  </script>

</body>
</html>