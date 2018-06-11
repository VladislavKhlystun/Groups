<?php 
require 'db.php';
/*$circle = R::find('circle', 'id >1');*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Index</title>
	<link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
  .df{display: flex;flex-direction: column;align-items: center;}
  .accordion {
    border: 0;
    background-color: rgba(255, 242, 195, 0);
    outline: none;
    margin: 3px 0;
    font-size: 17px;
    cursor: pointer;
  }
  .accordion:hover {text-decoration: underline;}
  .panel {
    display: none;
    margin-left: 10px;
  }
  .footer {
    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 158px;
    border-top: 1px solid #000;
  }
  .footer-block {
    display: flex;
    justify-content: center;
    font-size: 18px;
  }
  .footer__span {margin-right: 3px;}
  .footer__link {
    color:#000;
    text-decoration: none;
    font-weight: 600;
  }
  .footer__link:hover {
    color:#445454;
    text-decoration: underline;
  }
</style>
</head>
<body>
	<!-- header -->
	<header class="header"></header>
	
	<!-- content -->
	<div class="wrap">
    <section class="content">
      <h3 class="content__title">Гуртки Кропивницького</h3>
      
      <!-- Выезжающие списки кружков, школ, ПНЗ -->
      <div>
        <button class="accordion">Позашкільні навчальні заклади</button>
        <div class="panel">
          <div>
            <button class="accordion">Дитячий юнацький центр "Перлинка"</button>
            <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Дитячий юнацький центр \'Перлинка\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
         </div>

         <div>
          <button class="accordion">Центр позашкільного виховання "Контакт"</button>
          <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Центр позашкільного виховання \'Контакт\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
       </div>

       <div>
        <button class="accordion">Центр естетичного виховання "Натхнення"</button>
        <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Центр естетичного виховання \'Натхнення\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
     </div>

     <div>
      <button class="accordion">Позашкільний центр НВО №8</button>
      <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Позашкільний центр НВО №8';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
   </div>

   <div>
    <button class="accordion">Центр естетичного виховання НВК "Кіровоградський колегіум"</button>
     <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Центр естетичного виховання НВК \'Кіровоградський колегіум\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
 </div>

 <div>
  <button class="accordion">Центр естетичного виховання "Росток"</button>
       <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Центр естетичного виховання \'Росток\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Дитячий юнацький центр "Явір"</button>
 <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Дитячий юнацький центр \'Явір\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Дитячий юнацький центр "Лідер"</button>
  <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Дитячий юнацький центр \'Лідер\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Центр естетичного виховання "Калинка" НВО №17</button>
  <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Центр естетичного виховання \'Калинка\' НВО №17';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Центр дитячої та юнацької юнацької творчості "Надія" НВО № 18</button>
 <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Центр дитячої та юнацької юнацької творчості \'Надія\' НВО № 18';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Позашкільний центр НВО № 19</button>
  <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Позашкільний центр НВО № 19';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">ДЮЦ "Сузір'я"</button>
    <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'ДЮЦ \'Сузір\'я\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Центр дитячої та юнацької творчості "Оберіг"</button>
 <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Центр дитячої та юнацької творчості \'Оберіг\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>


<div>
  <button class="accordion">Центр позашкільного виховання "Ліра"</button>
  <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Центр позашкільного виховання \'Ліра\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Дитячий юнацький центр "Зорецвіт"</button>
  <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Дитячий юнацький центр \'Зорецвіт\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">ЦДЮТ "Сузір'я"</button>
 <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'ЦДЮТ \'Сузір\'я\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Позашкільний центр "Школа мистецтв" НВО №32</button>
  <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Позашкільний центр \'Школа мистецтв\' НВО №32';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Дитячо-юнацький центр НВО № 34</button>
  <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Дитячо-юнацький центр НВО № 34';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Позашкільний центр "Дивосвіт" НВО № 35</button>
 <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Позашкільний центр \'Дивосвіт\' НВО № 35';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Станція юних техніків</button>
  <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Станція юних техніків';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Будинок дитячої та юнацької творчості</button>
 <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Будинок дитячої та юнацької творчості';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Центр науково-технічної творчості "Каскад"</button>
  <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Центр науково-технічної творчості \'Каскад\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Школа естетичного виховання "В гостях у казки"</button>
 <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Школа естетичного виховання \'В гостях у казки\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>

<div>
  <button class="accordion">Центр дитячої та юнацької творчості "Центр-Юність"</button>
  <div class="panel">
              <ul class="list">
                <li class="list-item">         
                  <?php 
                  $pnz = 'Центр дитячої та юнацької творчості \'Центр-Юність\'';
                  $circle = R::getAll('SELECT * FROM circle WHERE pnz = :pnz', [':pnz' => $pnz]);
                  $amountCircles = count($circle);
                  if ($amountCircles == 0 ) {
                    echo 'Гуртків немає';
                  }
                  foreach ($circle as $item => $name) { ?>
                  <form method="post" action="circle.php" class="list-item__link">
                   <input type="hidden" name="data" value="<?php echo $name['id'] ?>">
                   <button class="btn-circleName" type="submit" style="border: 0;background-color: #fffaea; cursor: pointer;"><?php echo $name['name_circle']; ?></button>
                 </form>
                 <?php }; ?>         
               </li>
             </ul>
           </div>
</div>
</div>
</div>
<hr> 

<div>
  <button class="accordion">Керівники</button>
  <div class="panel">
    <?php 
      $allHeads = R::findAll('heads');
      foreach ($allHeads as $key => $value) {
        echo  '<button class="accordion" style="display: block;">' .$value['second_name']. ' '. $value['first_name'] . ' ' . $value['last_name'] . '</button>' ; 
        $id_head = $value['id'];
        $circles = R::find('circle', 'head_id = ?', [$id_head]); 
        $amount = count($circles);?>
        <div class="panel">
          <?php 
          if ($value['phone'] == '') {
            echo '<div>' .'Телефон: ' .'телефон відсутній' . '</div>';
          } else {
            echo '<div>' . 'Телефон: ' .$value['phone'] . '</div>';
          }
            echo 'Керівництво гуртками: '; 
            if ($amount == 0 ) {
              echo 'Не є керівником жодного з гуртків';
            } else {
            foreach ($circles as $key => $name) {
          echo  $name['name_circle'] . ' ' ;
        }
      }
          ?>

        </div>
        
        
    <?php  }  
    ?>
    
  </div>
</div>

<hr> 

<div>
  <button class="accordion">Учні  </button>
  <div class="panel">
    <?php 
      $allUsers = R::findAll('users');
      foreach ($allUsers as $key => $value) {
        echo  '<button class="accordion" style="display: block;">' .$value['second_name']. ' '. $value['first_name'] . ' ' . $value['last_name'] . '</button>' ; 
        $id_user = $value['id'];
        $circles = R::find('circlepupils', 'pupils_id = ?', [$id_user]); ?>
        <div class="panel">
          <?php
          if ($value['school'] == '') {
            echo '<div>' . 'ЗОШ: ' . 'Не заповнено учнем' . '</div>'; 
          } else {
              echo '<div>' . 'ЗОШ: ' .$value['school'] . '</div>'; 
            }
            $user_circles_id = [];
                foreach ($circles as $key => $itemCircle) {
                  $user_circles_id[] = $itemCircle['circle_id'];
              } 
              $user_circles = R::loadAll('circle', $user_circles_id);
              $amountUser_circles = count($user_circles);
              echo 'Список гуртків: ';
              if ($amountUser_circles == 0) {
                echo  'Не бере участь у жодному з гуртків' ;
              } else {
             foreach ($user_circles as $key => $nameCircles) {
                echo $nameCircles['name_circle'] . ' ' ; 
              }
            }
              
        ?>
        </div>          
    <?php  }  ?> 
  </div>
</div>
<hr>
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
</section>
</div>
<?php 

if (isset($_POST['login_admin'])) {
  $user = R::findOne('admin', 'email = ?', [$_POST['login']]);
  if ($user) {
    if (password_verify($_POST['password'], $user->password)) {
      $_SESSION['logged_user'] = $user;
      echo '<div style="position: absolute;top:50%;left:45%;color:green;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">Вхід виконано!</div>';
    } else {
      $errors[] = "Пароль невірний!";
    }
  } else {
    $errors[] = "Логін не знайдено";
  }
  if ( ! empty($errors) ) {
      //выводим ошибки авторизации
    echo '<div id="errors" style="position: absolute;top:50%;left:45%;color:red;font-size:18px;border:1px solid #000;border-radius:5px;padding:40px 50px;background-color:rgba(39,38,34,0.5);">' .array_shift($errors). '</div>';
  }
  ?> 
  <script> 
    function func() {
      window.location.href = 'index.php';
    }
    setTimeout(func, 2000); 
  </script> 
  <?php } ?>



  <footer class="footer">
    <div class="footer-block">
      <span class="footer__span">Розробник</span>
      <a href="http://www.kntu.kr.ua/" class="footer__link">ЦНТУ</a>
    </div>

    <div style="position: absolute;right: 0;"><!-- position: absolute;top: 79%;right: 0; -->
      <span style="cursor: pointer;cursor: pointer;display: flex;justify-content: center;border: 1px solid;border-radius: 3px;padding: 3px;" id="showpanel">  Увійти в адмінпанель </span>
      <form action="index.php" method="post" id="admin_form" class="df" style="display: none;">
        <div style="margin: 5px;">Логін</div>
        <input type="text" style="margin-bottom: 5px;" name="login">

        <div style="margin: 5px;">Пароль</div>
        <input type="password" style="margin-bottom: 5px;" name="password" >
        <button type="submit" name="login_admin" style="margin: 0 auto;">Вхід</button>
      </form>
    </div>
  </footer>

  <!-- scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script >
    $('#showpanel').click(function () {
      $('#admin_form').toggle('slow');
    })
  </script>
  <!-- accordion script -->
  <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }
  </script>
</body>
</html>
