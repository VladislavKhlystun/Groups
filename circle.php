<?php 
  require 'db.php';

  //$sa = R::exec('SELECT * FROM circle');
  $circle = R::findAll('circle');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Circle</title>
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header class="header"></header>
  <!-- .header -->

  <div class="wrap">
    <section class="content">
      <h3 class="content__title">
        <a href="index.php" class="get-back"><i class="fas fa-arrow-left back"></i></a>
        <?php
          $text=$_POST['data'];
          $NAMA = R::find('circle', 'id = ? ', [$text]);

          foreach ($NAMA as $key) {
            echo $key->name_circle;
          } 
        ?>
      </h3>
      
      <ul class="circle">
        <li class="circle-list">
          <span class="circle__title">Позашкільний НЗ</span>
          <?php
          foreach ($NAMA as $key) {
            echo '<div style="width:900px;margin-bottom: 20px;">'.$key->pnz.'</div>';
          }
          ?>
        </li>

        <li class="circle-list">
          <span class="circle__title">Напрям діяльності</span>
          <?php
          foreach ($NAMA as $key) {
            echo '<div style="width:900px;margin-bottom: 20px;">'.$key->direction.'</div>';
          }
          ?>
        </li>

        <li class="circle-list">
          <span class="circle__title">Назва гуртка</span>
          <?php
          foreach ($NAMA as $key) {
            echo '<div style="width:900px;margin-bottom: 20px;">'.$key->name_circle.'</div>';
          }
          ?>
        </li>

        <li class="circle-list">
          <span class="circle__title">Керівник гуртка</span>
           <?php
            foreach ($NAMA as $key) {
              $id_head = $key->head_id;
            }
            $head = R::findAll('heads', 'id = ?', [$id_head]);
            $amountHead = count($head);
            if ($amountHead == 0 ) {
              echo '<div style="width:900px;margin-bottom: 20px;">Керівник гуртка відсутній...</div>';
            }
            foreach ($head as $key => $item ) {
              echo '<div style="width:900px;margin-bottom: 20px;">'.$item['second_name'] . ' ' . $item['first_name'] . ' ' . $item['last_name'].'</div>';
            }
          ?>
        </li>

        <li class="circle-list">
          <span class="circle__title">Анотація</span>
          <?php

            foreach ($NAMA as $key) {
              if ($key->summary != ''){
                echo '<div style="width:900px;margin-bottom: 20px;">'.$key->summary.'</div>';
              } else {
                echo '<div style="width:900px;margin-bottom: 20px;">Анотація відсутня на даний момент...</div>';
              }
            }
          ?>
        </li>

        <li class="circle-list">
          <span class="circle__title">Досягнення</span>
          <?php
            foreach ($NAMA as $key) {
              if  ($key->achievement != '') {
                echo '<div style="width:900px;margin-bottom: 20px;">'.$key->achievement.'</div>';
              }
              else {
                echo '<div style="width:900px;margin-bottom: 20px;">Досягнень поки немає...</div>';
              }
            }
          ?>
        </li>

        <li class="circle-list">
          <span class="circle__title">Розклад роботи гуртка</span>
          <?php
            foreach ($NAMA as $key) {
              if($key->schedule != '') {
              echo '<div style="width:900px;margin-bottom: 20px;">'.$key->schedule.'</div>';
            } else {
              echo '<div style="width:900px;margin-bottom: 20px;">Розклад недоступниий на даний момент...</div>';
            }
            }
          ?>
        </li>

        <li class="circle-list">
          <span class="circle__title">Учні</span>
          <div>
          <?php
          $pupils = R::findAll('circlepupils', 'circle_id = ?', [$text]);
          $amountPupils = count($pupils);
          if ($amountPupils == 0) {
            echo '<div style="width:900px;margin-bottom: 20px;">Немає учнів в гуртку...</div>';
          }
          $id_pupils = [];
          $k = 0;
          foreach ($pupils as $key => $item) {
            $id_pupils[$k] = $item->pupils_id;
            $k++;
          }
          $nw = R::loadAll('users', $id_pupils);
          foreach ($nw as $key => $item) {
            echo '<div style="margin-bottom: 20px;margin-right:5px;padding-right:5px;border-bottom:1px solid #000;">'.$item['second_name'] . ' ' . $item['first_name'] . ' ' . $item['last_name'] .'</div>' ;
          }
          ?>
        </div>
        </li>

        <li class="circle-list">
          <span class="circle__title">Адреса</span>
          <?php
            foreach ($NAMA as $key) {
              echo '<div style="width:900px;margin-bottom: 20px;">'.$key->address.'</div>';
            }
          ?>
        <li>


        <li class="circle-list">
          <span class="circle__title">Телефон</span>
          <?php
          foreach ($NAMA as $key) {
            echo '<div style="width:900px;margin-bottom: 20px;">'.$key->phone.'</div>';
          }
          ?> 
        </li>


        <li class="circle-list">
          <span class="circle__title">Е-пошта</span>
          <?php
          foreach ($NAMA as $key) {
            echo '<div style="width:900px;margin-bottom: 20px;">'.$key->email.'</div>';
          }
          ?>
        </li>


        <li class="circle-list">
          <span class="circle__title">Веб-сайт</span>
          <?php
            foreach ($NAMA as $key) {
              if ($key->web_site != '') {
                echo '<a href='. $key->web_site .' style="width:900px;margin-bottom: 20px;">' . $key->web_site . '</a>';
              } else {
                echo '<div style="width:900px;margin-bottom: 20px;">Сайт відсутній</div>';
              }
            }
          ?>
        </li>
               
      </ul>

      <a href="index.php" class="get-back btm">На головну</a>
    </section>
    
    <!-- .content Контент сайта -->

    <!-- .sbar Сайдбар сайта (панель аутентификации на сайте) -->
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  <script src="js/config_script.js"></script>
</body>
</html>