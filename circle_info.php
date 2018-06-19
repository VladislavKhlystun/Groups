<?php 
  require 'db.php';

  //$sa = R::exec('SELECT * FROM circle');

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
  <style>
    .circle__title {
      font-weight: 600;
      line-height: 22px;
    }
    .circle-list {
      font-weight: 300;
      margin-left: 12px;
    }
  </style>
</head>
<body>
  <header class="header"></header>
  <!-- .header -->

  <div class="wrap">
    <section class="content">
      <h3 class="content__title">
        <a href="head_circle.php" class="get-back"><i class="fas fa-arrow-left back"></i></a>
        <?php
          $text=$_POST['data'];
          $NAMA = R::find('circle', 'id = ? ', [$text]);
          foreach ($NAMA as $key) {
            echo $key->name_circle ;
          } 
        ?>
      </h3>
      <div class="content_edit">
      <ul class="circle">
        <span class="circle__title">Позашкільний НЗ</span>
        <li class="circle-list">
          <?php
            foreach ($NAMA as $key) {
              echo $key->pnz;
            }
          ?>
        </li>

        <span class="circle__title">Напрям діяльності</span>
        <li class="circle-list"> 
          <?php
            foreach ($NAMA as $key) {
              echo $key->direction;
            }
          ?>
        </li>

        <span class="circle__title">Назва гуртка</span> 
        <li class="circle-list"> 
          <?php
            foreach ($NAMA as $key) {
              echo $key->name_circle;
            }
          ?>
         </li>

       <span class="circle__title">Анотація</span>
        <li class="circle-list">
          <?php

            foreach ($NAMA as $key) {
              if ($key->summary != ''){
                echo $key->summary;
              } else {
                echo 'Анотація відсутня на даний момент...';
              }
            }
          ?>
        </li>

        <span class="circle__title">Досягнення</span>
        <li class="circle-list">
          <?php
            foreach ($NAMA as $key) {
              if  ($key->achievement != '') {
                echo $key->achievement;
              }
              else {
                echo 'Досягнень поки немає...';
              }
            }
          ?>
        </li>

        <span class="circle__title">Розклад роботи гуртка</span>
        <li class="circle-list">
          <?php
            foreach ($NAMA as $key) {
              if($key->schedule != '') {
              echo $key->schedule;
            } else {
              echo 'Розклад недоступниий на даний момент...';
            }
            }
          ?>
        </li>

        <span class="circle__title">Учні</span>
        <li class="circle-list">
          <?php
             $pupils = R::findAll('circlepupils', 'circle_id = ?', [$text]);
             $amount_pupils = count($pupils);
          if ($amount_pupils == 0) {
            echo 'Немає учнів в гуртку...';
          }
          $id_pupils = [];
          $k = 0;
          foreach ($pupils as $key => $item) {
            $id_pupils[$k] = $item->pupils_id;
            $k++;
          }
          $nw = R::loadAll('users', $id_pupils);
          foreach ($nw as $key => $item) {
            echo $item['second_name'] . ' ' . $item['first_name'] . ' ' . $item['last_name'] . '<br/>' ;
          }
          ?>
        </li>

        <span class="circle__title">Адреса</span>
        <li class="circle-list">
          <?php
            foreach ($NAMA as $key) {
              echo $key->address;
            }
          ?>
        <li>

        <span class="circle__title">Телефон</span>
        <li class="circle-list">
          <?php
            foreach ($NAMA as $key) {
              echo $key->phone;
            }
          ?> 
        </li>

        <span class="circle__title">Е-пошта</span>
        <li class="circle-list">
          <?php
            foreach ($NAMA as $key) {
              echo $key->email;
            }
          ?>
        </li>

         <span class="circle__title">Веб-сайт</span>
        <li class="circle-list">
          <?php
            foreach ($NAMA as $key) {
              if ($key->web_site != '') {
                echo $key->web_site;
              } else {
                echo 'Сайт відсутній';
              }
            }
          ?>
        </li>      
      </ul>
     
          
  </div>
      <a href="head_circle.php" class="get-back btm">На головну</a>
    </section>
    
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
  <script src="js/config_script.js"></script>
</body>
</html>