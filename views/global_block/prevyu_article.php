<section class="section_5 fade_out mm_animate" data-animate="fade_in">
  <div class="news_wrapper">
    <div class="news_wrapper_left">
      <?php
      if (count($data_news) != 0) {
        echo "<p class='news_wrapper_title'>" . translate("Новости", "Новини", "News") . "</p>
          <p class='all_link'><a href='" . translate("/ru/news/", "/news/", "/en/news/") . "' class='background_white'>" . translate("все новости", "всі новини", "all news") . "</a></p>
          <div class='litle_card_wrapper'>";
        for ($i = 0; $i < count($data_news['post_title']); $i++) {
          echo "<div class='litle_card position_bottom mm_animate' data-animate='fade_up'>
            <div class='litle_card_left'>
              <img src='" . $data_news['img'][$i] . "'>
              <img src='/template/images/edge.png' class='card_edge'>
            </div>
            <div class='litle_card_right'>
              <div class='litle_card_right_wrapper'>
                <p class='litle_card_text_first color_red'>" . $data_news['data_field'][$i] . "</p>
                <p class='litle_card_text_second color_blue'>" . $data_news['post_title'][$i] . "</p>
                <div>" . $data_news['short_desc'][$i] . "</div>
                <p class='litle_card_read_more'><a href='" . $data_news['permalink'][$i] . "'>" . translate("Подробнее", "Детальніше", "More") . "</a></p>
              </div>
            </div>
          </div>";
        }
        echo "</div>";
      }
      ?>
    </div>
    <div class="news_wrapper_right">
      <?php
      if (count($data_blog) != 0) {
        echo "<p class='news_wrapper_title'>" . translate("Статьи", "Статті", "Articles") . "</p>
          <p class='all_link'><a href='" . translate("/ru/blog/", "/blog/", "/en/blog/") . "' class='background_white'>" . translate("все статьи", "всі статті", "all articles") . "</a></p>
          <div class='litle_card_wrapper'>";

        for ($i = 0; $i < count($data_blog['post_title']); $i++) {
          echo " <div class='litle_card position_bottom mm_animate' data-animate='fade_up'>
              <div class='litle_card_left'>
                <img src='" . $data_blog['img'][$i] . "'>
                <img src='/template/images/edge.png' class='card_edge'>
              </div>
              <div class='litle_card_right'>
                <div class='litle_card_right_wrapper'>
                  <p class='litle_card_text_first color_red'>" . translate("Автор", "Автор", "AUTHOR") . " - " . $data_blog['author'][$i] . "</p>
                  <p class='litle_card_text_second color_blue'>" . $data_blog['post_title'][$i] . "</p>
                  <div>" . $data_blog['short_desc'][$i] . "</div>
                  <p class='litle_card_read_more'><a href='" . $data_blog['permalink'][$i] . "'>" . translate("Подробнее", "Детальніше", "More") . "</a></p>
                </div>
              </div>
            </div>";
        }
      }
      ?>
    </div>
  </div>
  </div>
</section>