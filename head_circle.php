<?php 
require 'db.php';
$item = $_SESSION;
  foreach ($item as $key => $aa) {
    $role = $aa['role'];
  }
if ($role != 1) {
	header('Location: error.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Head circle</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/head_circle.css">
  <style>
    .headerCircle {
      display: -webkit-flex;
      display: -moz-flex;
      display: -ms-flex;
      display: -o-flex;
      display: flex;
      justify-content: center;
      margin-bottom: 10px;
    }
    .headerCircle h1 {font-size: 23px;}
    .circle__title {
      font-weight: 600;
      line-height: 22px;
    }
    .circle-list {
      font-weight: 300;
    }
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
 <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
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

      		<?php 
				$id = $_SESSION['logged_user']->id;
				$head_info = R::find('circle', 'head_id = ?', [$id]);
			?>

		<div style="margin-bottom: 60px;">	
			<div class="headerCircle">
				<h1>Мої гуртки</h1>
			</div>
			<div style=" display: flex; flex-wrap: wrap; justify-content: space-around; border-bottom: 1px solid;">
			<?php foreach ($head_info as $item) { ?>
          <form method="post" action="circle_info.php" class="list-item__link" >
             <input type="hidden" name="data" value="<?php echo $item->id ?>">
             <button class="btn-circleName" type="submit"><?php echo $item->name_circle;  ?></button>
           </form>
          <?php }; ?> 
    </div>
    <div class="container editing">	
     <form action="head_circle.php" method="post" style="display: flex;align-items: center;flex-direction: column;">
     	 <select name="select_circle_toAdd" class="del-circle__select">
          <option value="0">Вибрати гурток...</option>
          <?php 
          $circle = R::findAll('circle', 'head_id = ?', [$_SESSION['logged_user']->id]);
          foreach ($circle as $key => $item) {
            echo '<option value="'. $key.'">'. $item->name_circle .'</option>';
          }  
          ?>

        </select>

         <select name="select_user_toAdd" class="del-circle__select">

          <option value="0">Вибрати учня...</option>
          <?php 
          $pupils = R::findAll('users', 'ORDER BY second_name ASC');
          foreach ($pupils as $key => $item) {
            echo '<option value="'. $key.'">'. $item->second_name . ' ' .  $item->first_name . ' ' .  $item->last_name .'</option>';
          }  
          ?>
        </select>
        <button class="but" type="submit" name="addUser">
          Додати в гурток 
        </button>
        <?php 
        $amountRecords = 0; $id_circle_add = 0; $id_pupils_add = 0;
        if (isset($_POST['addUser'])) {
        	$newUser = R::dispense('circlepupils');
        	$newUser->circle_id = $_POST['select_circle_toAdd'];
        	$newUser->pupils_id = $_POST['select_user_toAdd'];
        	$id_circle_add = $_POST['select_circle_toAdd'];
        	$id_pupils_add = $_POST['select_user_toAdd'];
          if( $id_circle_add == 0 || $id_pupils_add == 0) {
            echo '<div style="position: absolute;top:50%;left:40%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Не вибрано гуртка або учня</div>';
          } else {
        	$bean_toAdd = R::getAll('SELECT * FROM circlepupils WHERE pupils_id = :pupils AND circle_id = :circles', [':pupils' => $id_pupils_add, ':circles' => $id_circle_add]);
        	$bean_checkAmountCircles = R::getAll('SELECT * FROM circlepupils WHERE pupils_id = :pupils', [':pupils' => $id_pupils_add]);
        	$amountUserCircles = count($bean_checkAmountCircles);
        	$amountRecords = count($bean_toAdd);
        	if ($amountRecords == 0) {
        		if ($amountUserCircles == 3) {
        			echo '<div class="pop-up__info"> Учень вже бере участь в 3 гуртках! </div>';
        			goto end;
        		}
        		R::store($newUser);
        		echo '<div class="pop-up__ok"> Учень доданий до гуртка!</div>';
        	 } else {
        	 	echo '<div class="pop-up__no"> Такий учень вже є в гуртку! </div>';
        	 	$amountRecords = 0; 
        	 }
        	 end: 
            }?> 
          <script> 
    
    function func() {
      window.location.href = 'head_circle.php';
    }
    setTimeout(func, 2000); 
      </script>
      <?php } ?>
            
       
      </form>

      <form action="head_circle.php" method="post" class="editing-form">
      	<select name="select_circle" class="del-circle__select" id="aaa">
          <option value="0">Вибрати гурток...</option>
          <?php 
          $circle = R::findAll('circle', 'head_id = ?', [$_SESSION['logged_user']->id]);
          foreach ($circle as $key => $item) {
            echo '<option value="'. $key.'">'. $item->name_circle .'</option>';
          }  
          ?>
        </select>

         <select name="select_delete" class="del-circle__select gg" >
         	<option value="0">Вибрати учня</option>
          
        </select>
       
        <button class="but" type="submit" name="delete_pupil">
          Видалити з гуртка
        </button>
      </form>
      <?php 
      $id_circle = 0;
      $id_pupils = 0;
      $bean = 0;
      	if (isset($_POST['delete_pupil'])) {
      		$id_circle = $_POST['select_circle'];
      		$id_pupils = $_POST['select_delete'];
          if ($id_circle == 0 || $id_pupils == 0) {
            echo '<div style="position: absolute;top:50%;left:40%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Гурток або учень не вибраний для видалення</div>';
          } else {
      		$bean = R::getAll('SELECT * FROM circlepupils WHERE pupils_id = :pupils AND circle_id = :circles', [':pupils' => $id_pupils, ':circles' => $id_circle]);
      		
      		$deleting_id_circle = 0;
      		foreach ($bean as $key => $item) {
      			$deleting_id_circle = $item['id'];
      		}
      		$deletingItem = R::load('circlepupils', $deleting_id_circle);
      		R::trash($deletingItem);
          echo '<div style="position: absolute;top:50%;left:40%;color:green;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Видалено</div>';
          } ?> 
          <script> 
    
    function func() {
      window.location.href = 'head_circle.php';
    }
    setTimeout(func, 2000); 
      </script>

      <?php	}	
      ?>
      </div>
</div>
      <div class="big-block">
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

         <span class="circle__title">E-mail</span>
        <li class="circle-list">
          <?php
            echo $_SESSION['logged_user']->email;
          ?>
        </li>

         <span class="circle__title">Місце роботи </span>
        <li class="circle-list">
          <?php
            if ($_SESSION['logged_user']->work_place != '') {
            	echo $_SESSION['logged_user']->work_place;
            } else {
            	echo 'Додайте місце роботи...';
            }
          ?>
        </li>

         <span class="circle__title">Телефон</span>
        <li class="circle-list">
          <?php
            if ($_SESSION['logged_user']->phone != '') {
            	echo $_SESSION['logged_user']->phone ;
            } else {
            	echo 'Додайте телефон...';
            }
          ?>
        </li>  

         <span class="circle__title">Адреса</span>
        <li class="circle-list">
          <?php
            if($_SESSION['logged_user']->address != '') {
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
      
      <form action="head_circle.php" class="new_form" method="post">
        <h2 style="margin: 15px 0; font-size: 18px;">Редагування профілю</h2>
        <div class="items"> 
         <strong>Ваше ім'я</strong><br>
         <input type="text" class="items__input" name="first_name" value="<?php echo @$data['first_name']; ?>"><br/>
       </div>

       <div class="items"> 
         <strong>Ваше прізвище</strong><br>
         <input  type="text" class="items__input" name="second_name" value="<?php echo @$data['second_name']; ?>"><br/>
       </div>

       <div class="items">
         <strong>Ваше по-батькові</strong><br>
         <input type="text" class="items__input" name="last_name" value="<?php echo @$data['last_name']; ?>"><br/>
       </div>

       <div class="items">
        <strong>Ваш E-mail</strong><br>
        <input type="text" class="items__input" name="email" value="<?php echo @$data['email']; ?>"><br/>
      </div>

      <div class="items">
        <strong>Ваше місце роботи</strong><br>
        <input type="text" class="items__input" name="work_place" value="<?php echo @$data['work_place']; ?>"><br/>
      </div>

      <div class="items">
        <strong>Ваш телефон</strong><br>
        <input class="telephone items__input" type="text" name="phone" value="<?php echo @$data['phone']; ?>"><br/>
      </div>

      <div class="items">
        <strong>Ваша адреса</strong><br>
        <input type="text" class="items__input" name="address" value="<?php echo @$data['address']; ?>"><br/>
      </div>

      <div class="items">
        <strong>Ваші спільноти</strong><br>
        <textarea type="text" name="social" style="min-width: 215px;max-width: 215px;min-height: 50px;max-height: 50px;" <?php echo @$data['social']; ?>> </textarea><br/>
      </div>
      <button type="submit" name="update_head" class="but">Оновити інформацію</button>
    </form>
    	<?php 

        if (isset($_POST['update_head'])) {
          $id = $_SESSION['logged_user']->id;
          $item = R::load('heads', $id);
          if (trim($_POST['first_name']) == '' && trim($_POST['second_name']) == '' && trim($_POST['last_name']) == '' && trim($_POST['email']) == '' && trim($_POST['work_place']) == '' && trim($_POST['phone']) == '' && trim($_POST['address']) == '' && trim($_POST['social']) == '' ) {
            echo '<div style="position: absolute;top:50%;left:40%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Не введено інформації</div>';
          } else {
               if ( trim($_POST['first_name']) != '' ) {
                        $item->first_name = $_POST['first_name'];
                    }
                    if ( trim($_POST['second_name']) != '' ) {
                        $item->second_name = $_POST['second_name'];
                    }
                    if ( trim($_POST['last_name']) != '' ) {
                        $item->last_name = $_POST['last_name'];
                    }
                     if ( trim($_POST['email']) != '' ) {
                      if (R::count('heads', 'email = ?', [$_POST['email']]) > 0) {
                         $errors[] = 'Користувач з таким e-mail вже існує!';
                      } else {
                        $item->email = $_POST['email'];
                        }
                      }
                    
                     if ( trim($_POST['work_place']) != '' ) {
                        $item->work_place = $_POST['work_place'];
                    }
                     if ( trim($_POST['phone']) != '' ) {
                        $item->phone = $_POST['phone'];
                    }
                    if ( trim($_POST['address']) != '' ) {
                        $item->address = $_POST['address'];
                    }
                    if ( trim($_POST['social']) != '' ) {
                        $item->social = $_POST['social'];
                    } 
                    if (empty($errors)) {
                    R::store($item);
                    echo '<div style="position: absolute;top:50%;left:40%;color:green;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Інформацію оновлено</div>';
                    $_SESSION['logged_user'] = $item; 
                  } else {
                    echo '<div style="position: absolute;top:50%;left:40%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">'.array_shift($errors).'</div>';
                  }
                  }?>

                    <script> 

                      function func() {
                        window.location.href = 'head_circle.php';
                      }
                      setTimeout(func, 2000); 
                    </script> 
                    <?php   } ?>
   
      </div>
    </section>
  </div>	
<!-- ================================================         ========================================================= -->

		 <form action="head_circle.php" class="new_form" method="post">
        <h2 style="margin: 15px 0; font-size: 18px;">  Редагування інформації про гурток</h2>
        <select name="selectUpdate_circleInfo" id="" style="width: 200px;height: 30px;">
        <option value="0">Вибрати гурток...</option>
          <?php 
          $circle = R::findAll('circle', 'head_id = ?', [$_SESSION['logged_user']->id]);
          foreach ($circle as $key => $item) {
            echo '<option value="'. $key.'">'. $item->name_circle .'</option>';
          }  
          ?>
        </select>
      <div class="items"> 
       <strong >Анотація</strong><br>
        <textarea type="text" name="summary" style="max-width: 194px;min-width: 194px;max-height: 60px;min-height: 60px;" value="<?php echo @$data['summary']; ?>"> </textarea><br/>
        </div>

        <div class="items"> 
         <strong >Досягнення</strong><br>
        <textarea type="text" name="achievement" style="max-width: 194px;min-width: 194px;max-height: 60px;min-height: 60px;" value="<?php echo @$data['achievement']; ?>"> </textarea><br/>
        </div>

        <div class="items">
         <strong>Розклад роботи гуртка</strong><br>
        <textarea type="text" name="schedule" style="max-width: 194px;min-width: 194px;max-height: 60px;min-height: 60px;" value="<?php echo @$data['schedule']; ?>"> </textarea><br/>
        </div>
        <button type="submit" name="update_circleInfo" class="but">Оновити інформацію</button>
      </form>
      <?php 

        if (isset($_POST['update_circleInfo'])) {
        	$id_circle_toUpdate = 0;
        	$id_circle_toUpdate = $_POST['selectUpdate_circleInfo'];
        	if ($id_circle_toUpdate == 0) {
        		echo '<div style="position: absolute;top:50%;left:40%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Не вибрано гурток!</div>';
        	} else {
          $circle_toUpdate = R::load('circle', $id_circle_toUpdate);
          if (trim($_POST['summary']) != '') {
            $circle_toUpdate->summary = $_POST['summary'];
          }
           if (trim($_POST['achievement']) != '') {
            $circle_toUpdate->achievement = $_POST['achievement'];
          }
           if (trim($_POST['schedule']) != '') {
            $circle_toUpdate->schedule = $_POST['schedule'];
          }
          R::store($circle_toUpdate);
          echo '<div style="position: absolute;top:50%;left:40%;color:green;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Дані оновлено!</div>';
          }
          ?>
			
                    <script> 

                      function func() {
                        window.location.href = 'head_circle.php';
                      }
                      setTimeout(func, 2000); 
                    </script> 
                    <?php   } ?>
			
		 <form action="head_circle.php" method="post" class="boss-block" name="edit_head_password">
      <h2 class="">Зміна паролю</h2>
      
      <strong class="editpasslight">Новий пароль</strong><br>
      <input type="password" name="new_password"> <br/>

      <strong class="editpasslight">Повтор пароля</strong><br>
      <input type="password" name="new_passwordConfirm"> <br/>

      <button type="submit" class="but" name="update_head_password">Змінити пароль</button>
    </form>
    <?php 
    $id = $_SESSION['logged_user']->id;
      if (isset($_POST['update_head_password'])) {
         $userToUpdate = R::load('heads', $id);
         if (trim($_POST['new_password']) == '' && trim($_POST['new_passwordConfirm']) == '' ) {
          echo '<div style="position: absolute;top:50%;left:45%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Не введено пароль</div>';
         } else {
          if ( $_POST['new_passwordConfirm'] != $_POST['new_password'] ) {$errors[] = 'Повторний пароль введений невірно!';}
          if (empty($errors)) {

           $email = $_SESSION['logged_user']->email; $email = htmlspecialchars($email); $email = urldecode($email);
           $pass = $_POST['new_password']; $pass = htmlspecialchars($pass); $pass = urldecode($pass); 
           mail("$email", "Password Changed", "Login: " . $email  . "\r\nPassword: " . $pass, "From: e-mail сайта \r\n");

            $userToUpdate->password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            R::store($userToUpdate);
            echo '<div class="a" style="position: absolute;top:50%;left:45%;color:green;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);"> Пароль змінено! </div>';
            $_SESSION['logged_user'] = $userToUpdate;
          } else {
            echo '<div id="errors" style="position: absolute;top:50%;left:45%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">' .array_shift($errors). '</div><hr>';
          }
      } ?> 
      <script> 
            function func() {
              window.location.href = 'head_circle.php';
            }
            setTimeout(func, 2000); 
          </script>
    <?php }
    ?>

		<script>
			$(document).ready(function () {
				$('#aaa').change(function() {
					$.ajax({
						type: "POST",
						url: "show.php",
						data: "aaa="+$("#aaa").val(),
						success: function(html) {
							$('.gg').html(html);
						}
					});
					return false;
				});
			});
		</script>
		 <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  		<script src="js/jquery.maskedinput.min.js"></script>
		<script >
			$(".telephone").mask("+380(99) 999-99-99");
		</script>
</body>
</html>