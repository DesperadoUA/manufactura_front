<?php

class NewsController
{
    const NUMBER_ARTICLE_ON_PAGE = 6;
    public function actionIndex()
    {
        $data = News::get_data();
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_blog = News::getDataLastPosts($data['lang'], 2);
            $data_form = Settings::getFormsData($data['lang']);
			$data_footer_logos = Settings::getFooterLogos($data['lang']);
            require_once(ROOT . "/views/site/single.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }

    public function actionCategory()
    {
        $data = staticPage::get_data("news");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        $pagination_number = SiteFunction::getPaginationPage();
        $data_news = News::get_list_data($pagination_number);
        $data_form = Settings::getFormsData($data['lang']);
        $total_number_page = SiteFunction::getTotalNumberPage('news', $data['lang']);
        $pagination = new Pagination($total_number_page, $pagination_number, self::NUMBER_ARTICLE_ON_PAGE, 'page-');

        $data_direction_id = News::getUniqueDirectionId($data['lang']);
        if (count($data_direction_id['direction_id']) != 0) {
            $data_direction = Direction::getDataArrId($data_direction_id['direction_id']);
        } else {
            $data_direction = [];
        }
        require_once(ROOT . "/views/news/category.php");
        return true;
    }
}
