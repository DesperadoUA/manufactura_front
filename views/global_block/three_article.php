<?php
if (count($data_blog) != 0) {
    echo "<section class='three_article'>
    <div class='direction_article'><p>" . translate(
    	"Статьи",
		"Статті",
		"Articles") . "</p></div>
    <div class='article_container'>";
    for ($i = 0; $i < count($data_blog['post_title']); $i++) {
        echo "<div class='litle_card'>
        <div class='litle_card_left'>
                <img src='{$data_blog['img'][$i]}'>
                <img src='/template/images/edge.png' class='card_edge'>
        </div>
        <div class='litle_card_right'>
            <div class='litle_card_right_wrapper'>
                  <p class='litle_card_text_first color_red'>" . translate(
                  	"Дата",
					"Дата",
					"Date") . " - " . $data_blog['data_field'][$i] . "</p>
                  <p class='litle_card_text_second color_blue'>{$data_blog['post_title'][$i]}</p>
                  <p>{$data_blog['short_desc'][$i]}</p>
                  <p class='litle_card_read_more'>
                    <a href='{$data_blog['permalink'][$i]}'>" . translate(
                    	"Подробнее",
						"Детальніше",
						"More") . "</a></p>
            </div>
        </div>
    </div>";
    }
    echo "</div>
		  <div><p class='all_article'>
		      	<a href='". translate(
			'/ru/blog/',
			'/blog/',
			'/en/blog/') ."' 
		      	class='background_blue'>". translate(
                  	'Все статьи',
					'Всі статті',
					'All articles') ."
		      	</a>
		      </p>
		</div>
    </section>";
}
