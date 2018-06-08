<?php 
require 'db.php';
$items = R::findAll('circlepupils', 'circle_id = ?', [$_REQUEST['aaa']]);
$id_pupils = [];
$k = 0;
foreach ($items as $key => $item) {
	$id_pupils[$k] = $item->pupils_id;
	$k++;
}
$item_pupils = R::loadAll('users', $id_pupils);

foreach ($item_pupils as $key => $item) {
	echo '<option value="' .$key . '">' . $item['second_name'] . ' ' . $item['first_name'] . ' ' . $item['last_name'] . ' ' . '</option>';
}
?>