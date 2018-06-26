<?php 
require 'db.php';
$circle = R::find('circle', 'id = ?', [$_REQUEST['edit_head']]);
$id = 0;
foreach ($circle as $key => $value) {
	$id = $value['id'];
}
$item_circle = R::load('circle', $id);
$id_head = $item_circle->head_id;
$head = R::load('heads', $id_head);
echo '<div style="display: flex;flex-direction: column;justify-content: space-between;height: 80%;width: 530px;">'. 
			'<div style="font-weight: 600;line-height: 24px;">Анотація: </div>' 												. '<div style="font-weight: 300;">' . $item_circle->summary . '</div>' .
			'<div style="font-weight: 600;line-height: 24px;">Досягнення: </div>' 										 	. '<div style="font-weight: 300;">' . $item_circle->achievement . '</div>' .
			'<div style="font-weight: 600;line-height: 24px;">Розклад: </div>' 											 		. '<div style="font-weight: 300;">' . $item_circle->schedule . '</div>' .	
'</div>';
?>