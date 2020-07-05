<?php
/**
 * Created by PhpStorm.
 * User: Костя
 * Date: 26.04.2020
 * Time: 11:32
 */?>
<div class="col-lg-12 breadcrump_wrapper">
	<div class="breadcrumbs">
		<?php
			function create_item($item) {
			    if($item['text_2'] !== '#') {
					$str_cod = "<span><a href='{$item['text_2']}'>{$item['text_1']}</a></span>";
                }
                else {
					$str_cod = "<span>{$item['text_1']}</span>";
                }
				return $str_cod;
			}
			echo implode('', array_map('create_item', $data['json_content']['breadcrumbs']));
		?>
	</div>
</div>
