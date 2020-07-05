<div class="container">
		<div class="row">
			<div class="col-lg-12 footer_company">
				<?php
					function create_footer_logo_item($item){
						$strCod = "<a href='{$item['text_1']}' target='_blank'>
									<img src='' data-desctop-easy-load = '{$item['src']}' ></a>";
						return $strCod;
					}
					echo implode('', array_map('create_footer_logo_item', $data_footer_logos));
				?>
			</div>
		</div>
	</div>
