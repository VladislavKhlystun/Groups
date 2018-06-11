<?php 
require 'db.php';
$circle = R::find('circle', 'id = ?', [$_REQUEST['edit_circle']]);
$id = 0;
foreach ($circle as $key => $value) {
	$id = $value['id'];
}
$item_circle = R::load('circle', $id);
$id_head = $item_circle->head_id;
$head = R::load('heads', $id_head);
echo '<div>'. '<div>' . 'Позашкільний навчальний заклад: ' . $item_circle->pnz. '</div>' . 
			'<div>' . 'Напрям: ' . $item_circle->direction. '</div>' .
			'<div>' . 'Назва: ' . $item_circle->name_circle. '</div>' .
			'<div>' . 'Керівник: ' . $head->second_name .' ' . $head->first_name . ' ' . $head->last_name . '</div>' .
			'<div>' . 'Анотація: ' . $item_circle->summary. '</div>' .
			'<div>' . 'Досягнення: ' . $item_circle->achievement. '</div>' .
			'<div>' . 'Розклад: ' . $item_circle->schedule. '</div>' .	
			'<div>' . 'Адреса: ' . $item_circle->address. '</div>' .
			'<div>' . 'Телефон: ' . $item_circle->phone. '</div>' .	
			'<div>' . 'E-mail: ' . $item_circle->email. '</div>' .
			'<div>' . 'Веб-сайт: ' . $item_circle->web_site. '</div>' .
'</div>';
?>
