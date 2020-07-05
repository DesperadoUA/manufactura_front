<?php
if (count($data_blog) != 0) {
    echo "<section class='prevyu_article'>
    <div class='container'>
        <div class='row'>
            <div class='col-lg-12'>
                <p class='prevyu_article_title'>" . translate("Читать статьи по теме", "Читати статті по темі", "Read Related Articles") . "</p>
            </div>";
    for ($i = 0; $i < count($data_blog['post_title']); $i++) {
        echo "<div class='col-lg-6'>
                <div class='litle_card_wrapper'>
                    <div class='litle_card'>
                        <div class='litle_card_left'>
                            <img src='" . $data_blog['img'][$i] . "'>
                            <img src='/template/images/edge.png' class='card_edge'>
                        </div>
                        <div class='litle_card_right'>
                            <div class='litle_card_right_wrapper'>
                                <p class='litle_card_text_first color_red'>" . $data_blog['data_field'][$i] . "</p>
                                <p class='litle_card_text_second color_blue'>" . $data_blog['post_title'][$i] . "</p>
                                <p>" . $data_blog['short_desc'][$i] . "</p>
                                <p class='litle_card_read_more'><a href='" . $data_blog['permalink'][$i] . "'>" . translate("Подробнее", "Детальніше", "More") . "</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    }
    echo " </div>
    </div>
</section>";
}
