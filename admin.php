<?php 
require 'db.php';
$item = $_SESSION;
  foreach ($item as $key => $aa) {
    $role = $aa['role'];
  }
if ($role != 3) {
  header('Location: error.php');
}
$circle = R::findAll('circle');
// ======================Создать кружок====================================
$data = $_POST;
//если кликнули на button.
if ( isset($data['submit_create']) ) {
  // проверка формы на пустоту полей
  $errors = array();
  if ( trim($data['pnz']) == '' )         {$errors[] = 'Введіть позашкільний навчальний заклад';}
  if ( trim($data['direction']) == '' )   {$errors[] = 'Введіть напрям';}
  if ( trim($data['name_circle']) == '' ) {$errors[] = 'Введіть назву гуртка';}
  // if ( trim($data['head_id']) == '' )     {$errors[] = 'Введіть head_circle';}
/*  if ( trim($data['achievement']) == '' ) {$errors[] = 'Введіть досягнення';}*/
/*  if ( trim($data['schedule']) == '' )    {$errors[] = 'Введіть розклад роботи куртка';}*/
  if ( trim($data['address']) == '' )     {$errors[] = 'Введіть адресу';}
  if ( trim($data['phone']) == '' )       {$errors[] = 'Введіть телефон';}
  if ( trim($data['email']) == '' )       {$errors[] = 'Введіть email';}
  //проверка на существование одинакового name_circle
  if ( R::count('circle', "name_circle = ?", array($data['name_circle'])) > 0) {
    $errors[] = 'Гурток з таким ім\'ям вже існує!';
  }
  if ( empty($errors) )  {
    //ошибок нет, теперь регистрируем
    $circle = R::dispense('circle');
    $circle->pnz = $data['pnz'];
    $circle->direction = $data['direction'];
    $circle->name_circle = $data['name_circle'];
/*    $circle->achievement = $data['achievement'];*/
/*    $circle->schedule = $data['schedule'];*/
    //$circle->pupils = $data['pupils'];
    $circle->address = $data['address'];
    $circle->phone = $data['phone'];
    $circle->email = $data['email'];
    $circle->web_site = $data['web_site'];
   R::store($circle);
   /* $message = "Line 1\r\nLine 2\r\nLine 3";
// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
$message = wordwrap($message, 70, "\r\n");
// Отправляем
mail('vladislav.khlystun@gmail.com', 'My Subject', $message);*/
    echo '<div style="position: absolute;top:0;left:40%;color:green;font-size:18px;">Гурток створено!</div>';
} else {
    echo '<div id="errors" style="color:red;position: absolute;top:0;left:40%;font-size:18px;"">' .array_shift($errors). '</div>';
}
 ?> 
<script> 
    
    function func() {
      window.location.href = 'admin.php';
    }
    setTimeout(func, 2000); 
      </script>
      <?php } 

 
  

 //======================================Удаление==================================== 
    if (isset($_POST['delete'])) {
      $id = 0;
      $id = $_POST['del'];
      if ($id == 0) {
        echo '<div style="position: absolute;top:0;left:45%;color:red;font-size:18px;"> Гурток не вибрано! </div>';
    } else {
       $del = R::load('circle',  $id);     
          $delCircle_id = $del->id;
          $users_inDeletingCircle = R::findAll('circlepupils', 'circle_id = ?', [$delCircle_id]);
          $amountUsers_inCircle = count($users_inDeletingCircle);
          if ($amountUsers_inCircle == 0) {
          R::trash( $del ); 
           echo '<div id="a" style="position: absolute;top:0;left:45%;color:green;font-size:18px;">Гурток видалено!</div>';
        } else {
          echo '<div id="a" style="position: absolute;top:0;left:30%;color:red;font-size:18px;">В гуртку ще є учні. Видаліть спочатку всіх учнів з гуртка для видалення!</div>';
        }
           
    }
  ?>
  <script> 
    
    function func() {
      window.location.href = 'admin.php';
    }
    setTimeout(func, 2000); 
      </script>
 <?php } ?>
 

 <?php 
            if (isset($_POST['submit_edit'])) {
                  $id = 0;
                $id = $_POST['select_circle'];
                if ($id == 0) {
                 echo '<div style="position: absolute;top:0;left:45%;color:red;font-size:18px;z-index:9999;"> Гурток не вибрано! </div>';
                } else {
                $item = R::load('circle', $id);
                    if ( trim($_POST['pnz']) != '' ) {
                        $item->pnz = $_POST['pnz'];
                    }
                    if ( trim($_POST['direction']) != '' ) {
                        $item->direction = $_POST['direction'];
                    }
                    if ( trim($_POST['name_circle']) != '' ) {
                        $item->name_circle = $_POST['name_circle'];
                    }
                     if ( trim($_POST['address']) != '' ) {
                        $item->address = $_POST['address'];
                    }
                    if ( trim($_POST['phone']) != '' ) {
                        $item->phone = $_POST['phone'];
                    }
                    if ( trim($_POST['email']) != '' ) {
                        $item->email = $_POST['email'];
                    }
                    if ( trim($_POST['web_site']) != '' ) {
                        $item->web_site = $_POST['web_site'];
                    }
                     echo '<div style="position: absolute;top:0;left:45%;color:green;font-size:18px;z-index:9999;">Гурток відредаговано!</div>';
                    R::store($item); 
                   }
                    ?>
                     <script> 
                        function func() {
                          window.location.href = 'admin.php';
                      }
                      setTimeout(func, 2000); 
                  </script>
           <?php    } ?> 
 

 <?php 
            $head_id = 0;
            $circle_id = 0;
               if (isset($_POST['appoint'])) {
                    $head_id = $_POST['head'];
                    $circle_id = $_POST['circle'];
                    if ($head_id == 0 || $circle_id == 0) {
                      echo '<div style="position: absolute;top:0;left:45%;color:red;font-size:18px;z-index:9999;"> Гурток або керівник не вибраний! </div>';
                    } else {
                    $item = R::load('circle', $circle_id);
                    $item->head_id = $head_id;
                    R::store($item);
                    echo '<div id="a" style="position: absolute;top:0;left:45%;color:green;font-size:18px;z-index:9999;"> Керівника призначено!</div>';
                  }
                    ?> 
                     <script> 
                        function func() {
                          window.location.href = 'admin.php';
                      }
                      setTimeout(func, 2000); 
                  </script>
            <?php   }     
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/fix-file.css">
  <style>
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
	<header class="header">
   <a href=" index.php"> На головну</a> 
  </header>
 
	
	<!-- content -->
  <section class="content">
    <input class="content__input" id="tab1" type="radio" name="tabs" checked>
    <label class="content__label" for="tab1"><i class="fas fa-plus-square"></i> Створити гурток</label>

    <input class="content__input" id="tab2" type="radio" name="tabs">
    <label class="content__label" for="tab2"><i class="fas fa-trash"></i> Видалити гурток</label>

    <input class="content__input" id="tab3" type="radio" name="tabs">
    <label class="content__label" for="tab3"> <i class="fas fa-edit"></i> Редагувати гурток</label>

    <input class="content__input" id="tab4" type="radio" name="tabs">
    <label class="content__label" for="tab4"><i class="fas fa-user-shield"></i> Призначити керівника</label>

    <section class="content-hide" id="content1">
      <form class="form" action="admin.php" method="post">
        <label for="1" class="form__label">Позашкільний НЗ</label>
        <input type="text" class="form__input" id="1" name="pnz">

        <label for="2" class="form__label">Напрям</label>
        <input type="text" class="form__input" id="2" name="direction">

        <label for="3" class="form__label">Назва гуртка</label>
        <input type="text" class="form__input" id="3" name="name_circle">

        <!-- <label for="4" class="form__label">Керівник гуртка</label>
        <input type="text" class="form__input" id="4" name="head_circle"> -->

<!--         <label for="5" class="form__label">Анотація</label>
<input type="text" class="form__input" id="5" name="summary"> -->
<!-- 
        <label for="6" class="form__label">Досягнення</label>
        <input type="text" class="form__input" id="6" name="achievement"> -->
<!-- 
        <label for="7" class="form__label">Розклад роботи гуртка</label>
        <input type="text" class="form__input" id="7" name="schedule"> -->

        <!-- <label for="8" class="form__label">Учні</label>
            <input type="text" class="form__input" id="8" name="pupils"> -->

        <label for="9" class="form__label">Адреса</label>
        <input type="text" class="form__input" id="9" name="address">

        <label for="10" class="form__label">Телефон</label>
        <input type="text" class="form__input telephone" id="10" name="phone">

        <label for="11" class="form__label">Е-пошта</label>
        <input type="text" class="form__input" id="11" name="email">

        <label for="12" class="form__label">Веб-сайт</label>
        <input type="text" class="form__input" id="12" name="web_site">

        <button class="form__btn" name="submit_create">Створити гурток</button>
      </form>


    </section>

    <section class="content-hide" id="content2">
      <form action="admin.php" class="del-circle" method="post">
        <select name="del" id="delete" class="del-circle__select">
          <option value="0">Вибрати гурток...</option>
          <?php 
          $id = 0;
          foreach ($circle as $key => $item) {
            echo '<option value="'. $key.'">'. $item->name_circle .'</option>';
          }  
          ?>
        </select>
        <button class="del-circle__btn" type="submit" name="delete">
          Видалити гурток
        </button>
      </form>
    </section>

    <section class="content-hide" id="content3">

      <form class="form" action="admin.php" method="post">
        
         <select name="select_circle" id="" class="del-circle__select" style="width: 50%;">
          <option value="0">Вибрати гурток...</option>
          <?php 
          $id = 0;
          foreach ($circle as $key => $item) {
            echo '<option value="'. $key.'">'. $item->name_circle .'</option>';
          }  
          ?>
        </select>
        

        <label for="1" class="form__label">Позашкільний НЗ</label>
        <input type="text" class="form__input" id="1" name="pnz">

        <label for="2" class="form__label">Напрям</label>
        <input type="text" class="form__input" id="2" name="direction">

        <label for="3" class="form__label">Назва гуртка</label>
        <input type="text" class="form__input" id="3" name="name_circle">

        <label for="9" class="form__label">Адреса</label>
        <input type="text" class="form__input" id="9" name="address">

        <label for="10" class="form__label ">Телефон</label>
        <input type="text" class="form__input telephone" id="10" name="phone">

        <label for="11" class="form__label">Е-пошта</label>
        <input type="text" class="form__input" id="11" name="email">

        <label for="12" class="form__label">Веб-сайт</label>
        <input type="text" class="form__input" id="12" name="web_site">

        <button class="form__btn" name="submit_edit">Редагувати гурток</button>
      </form>
    </section>

    <section class="content-hide" id="content4">
       <form action="admin.php" class="search" method="POST">
        <!-- <div class="search-head">
          <input type="text" class="search-head__input">
          <button class="search-head__btn"><i class="fas fa-search"></i></button>
        </div> -->
        <select name="circle" id="" class="del-circle__select">
          <option value="0">Вибрати гурток...</option>
          <?php 
          $id = 0;
          foreach ($circle as $key => $item) {
            echo '<option value="'. $key.'">'. $item->name_circle .'</option>';
          }  
          ?>
        </select>

        <select name="head" id="" class="del-circle__select">
          <option value="0">Вибрати керівника...</option>
          <?php 
          $head = R::findAll('heads');
          $id = 0;
          foreach ($head as $key => $item) {
            echo '<option value="'. $key.'">'. $item->first_name . ' '. $item->second_name . ' ' .$item->last_name .'</option>';
          }  
          ?>
        </select>
        <button class="search__btn" name="appoint">Призначити</button>
        
      </form>
    </section>

    <div style="display: flex; justify-content: space-between;margin-top: 20px;padding-top: 10px;border-top: 1px solid #ccc;"> 
      <div> 
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

        <span class="circle__title">Адреса</span>
        <li class="circle-list">
          <?php
            echo $_SESSION['logged_user']->address;
          ?>
        </li>

        <span class="circle__title">Телефон</span>
        <li class="circle-list">
          <?php
            echo $_SESSION['logged_user']->phone;
          ?>
        </li>

        <span class="circle__title">E-mail</span>
        <li class="circle-list">
          <?php
            echo $_SESSION['logged_user']->email;
          ?>
        </li>

        <span class="circle__title">Веб-сайт</span>
        <li class="circle-list">
          <?php
            echo $_SESSION['logged_user']->web_site;
          ?>
        </li>

      </ul>
      </div>

      <div> 
        <form action="admin.php" method="post">
          <h2 style="font-weight: 600;margin-bottom: 5px;">  Редагування профілю</h2>

          <strong>Ваше ім'я</strong><br>
          <input type="text" style="margin-bottom: 5px;" name="first_name" value="<?php echo @$data['first_name']; ?>"><br/>         

          <strong >Ваше прізвище</strong><br>
          <input type="text" style="margin-bottom: 5px;" name="second_name" value="<?php echo @$data['second_name']; ?>"><br/>          

          <strong >Ваше по-батькові</strong><br>
          <input type="text" style="margin-bottom: 5px;" name="last_name" value="<?php echo @$data['last_name']; ?>"><br/>         

          <strong >Ваша адреса</strong><br>
          <input type="text" style="margin-bottom: 5px;" name="address" value="<?php echo @$data['address']; ?>"><br/>         

           <strong >Телефон</strong><br>
          <input class="telephone" style="margin-bottom: 5px;" type="text" name="phone" value="<?php echo @$data['phone']; ?>"><br/>          

          <strong >E-mail</strong><br>
          <input type="text" style="margin-bottom: 5px;" name="email" value="<?php echo @$data['email']; ?>"><br/>          

          <strong >Веб-сайт</strong><br>
          <input type="text" style="margin-bottom: 5px;" name="web_site" value="<?php echo @$data['web_site']; ?>"><br/>          

          <button type="submit" name="update_adminInfo" style="cursor: pointer;border: 1px solid #000;background-color: #ccc;border-radius: 3px;padding: 4px 0px;width: max-content;text-transform: uppercase;">Оновити інформацію</button>
        </form>
      </div>
    </div>

</section>
    <?php 
      $admin_id = $_SESSION['logged_user']->id;
      if (isset($_POST['update_adminInfo'])) {
          $itemToUpdate = R::load('admin', $admin_id);
          if (trim($_POST['first_name']) == '' && trim($_POST['second_name']) == '' && trim($_POST['last_name']) == '' && trim($_POST['address']) == '' && trim($_POST['phone']) == '' && trim($_POST['email']) == '' && trim($_POST['web_site']) == '') {
            echo '<div style="position: absolute;top:0;left:45%;color:red;font-size:18px;">Не введено інформації</div>';
          } else {

          if (trim($_POST['first_name']) != '') {
            $itemToUpdate->first_name = $_POST['first_name'];
          }
          if (trim($_POST['second_name']) != '') {
            $itemToUpdate->second_name = $_POST['second_name'];
          }
          if (trim($_POST['last_name']) != '') {
            $itemToUpdate->last_name = $_POST['last_name'];
          }
          if (trim($_POST['address']) != '') {
            $itemToUpdate->address = $_POST['address'];
          }
          if (trim($_POST['phone']) != '') {
            $itemToUpdate->phone = $_POST['phone'];
          }
          if (trim($_POST['email']) != '') {
            $itemToUpdate->email = $_POST['email'];
          }
          if (trim($_POST['web_site']) != '') {
            $itemToUpdate->web_site = $_POST['web_site'];
          }
          R::store($itemToUpdate);
          $_SESSION['logged_user'] = $itemToUpdate;
          echo '<div class="a" style="position: absolute;top:0;left:45%;color:green;font-size:18px;"> Дані оновлено! </div>' ;
          }?> 
          <script> 
            function func() {
              window.location.href = 'admin.php';
            }
            setTimeout(func, 2000); 
          </script>
  <?php    }
    ?>

    <form action="admin.php" class="boss-block" method="post" name="edit_password">
      <h2 class="editpasstitle">Зміна паролю</h2>
      
      <strong class="editpasslight">Новий пароль</strong>
      <input type="password" name="new_password"> 

      <strong class="editpasslight">Повтор пароля</strong>
      <input type="password" name="new_passwordConfirm"> 

      <button type="submit" class="but" name="update_password">Змінити пароль</button>
    </form>
    <?php 
      if (isset($_POST['update_password'])) {
         $itemToUpdate = R::load('admin', $admin_id);
         if (trim($_POST['new_password']) == '' && trim($_POST['new_passwordConfirm']) == '' ) {
          echo '<div style="position: absolute;top:0;left:45%;color:red;font-size:18px;">Не введено пароль</div>';
         } else {
          if ( $_POST['new_passwordConfirm'] != $_POST['new_password'] ) {$errors[] = 'Повторний пароль введений невірно!';}
          if (empty($errors)) {
            $email = $_SESSION['logged_user']->email; $email = htmlspecialchars($email); $email = urldecode($email);
            $pass = $_POST['new_password']; $pass = htmlspecialchars($pass); $pass = urldecode($pass); 
             mail("$email", "Password Changed", "Login: " . $email  . "\r\nPassword: " . $pass, "From: e-mail сайта \r\n");
            $itemToUpdate->password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            R::store($itemToUpdate);
            echo '<div class="a" style="position: absolute;top:0;left:45%;color:green;font-size:18px;"> Пароль змінено! </div>';
            $_SESSION['logged_user'] = $itemToUpdate;
          } else {
            echo '<div id="errors" style="position: absolute;top:0;left:45%;color:red;font-size:18px;">' .array_shift($errors). '</div>';
          }
      }?> 
      <script> 
            function func() {
              window.location.href = 'admin.php';
            }
            setTimeout(func, 2000); 
          </script>
    <?php }
    ?>
<!-- scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script>
        $.mask.definitions['9']='[0-9]';
        $(".telephone").mask("+380(99) 999-99-99");
    </script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
</body>
</html>
