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
echo '<div style="display: flex;flex-direction: column;justify-content: space-between;height: 80%;width: 530px;">'. 
			'<div style="font-weight: 600;line-height: 24px;">Позашкільний навчальний заклад: </div>' 	. '<div style="font-weight: 300;">' . $item_circle->pnz . '</div>' . 
			'<div style="font-weight: 600;line-height: 24px;">Напрям діяльності: </div>' 												 	. '<div style="font-weight: 300;">' . $item_circle->direction . '</div>' .
			'<div style="font-weight: 600;line-height: 24px;">Назва: </div>' 												 		. '<div style="font-weight: 300;">' . $item_circle->name_circle . '</div>' .
			'<div style="font-weight: 600;line-height: 24px;">Керівник гуртка: </div>' 											 	. '<div style="font-weight: 300;">' . $head->second_name .' ' . $head->first_name . ' ' . $head->last_name . '</div>' .
			'<div style="font-weight: 600;line-height: 24px;">Анотація: </div>' 												. '<div style="font-weight: 300;">' . $item_circle->summary . '</div>' .
			'<div style="font-weight: 600;line-height: 24px;">Досягнення: </div>' 										 	. '<div style="font-weight: 300;">' . $item_circle->achievement . '</div>' .
			'<div style="font-weight: 600;line-height: 24px;">Розклад: </div>' 											 		. '<div style="font-weight: 300;">' . $item_circle->schedule . '</div>' .	
			'<div style="font-weight: 600;line-height: 24px;">Адреса: </div>' 												 	. '<div style="font-weight: 300;">' . $item_circle->address . '</div>' .
			'<div style="font-weight: 600;line-height: 24px;">Телефон: </div>'		 										 	. '<div style="font-weight: 300;">' . $item_circle->phone . '</div>' .	
			'<div style="font-weight: 600;line-height: 24px;">E-mail: </div>' 												 	. '<div style="font-weight: 300;">' . $item_circle->email . '</div>' .
			'<div style="font-weight: 600;line-height: 24px;">Веб-сайт: </div>' 											 	. '<div style="font-weight: 300;">' . $item_circle->web_site . '</div>' .
'</div>';
?>
