<?php
class BlogController
{
    const NUMBER_ARTICLE_ON_PAGE = 6;
    public function actionIndex()
    {
        $data = Blog::get_data();
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_form = Settings::getFormsData($data['lang']);
            $data_footer_logos = Settings::getFooterLogos($data['lang']);
            $data_blog = Blog::getDataLastPosts($data['lang'], 2);
            require_once(ROOT . "/views/site/single.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }

    public function actionCategory()
    {
        $data = staticPage::get_data("blog");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_form = Settings::getFormsData($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        $data_direction_id = Blog::getUniqueDirectionId($data['lang']);
        $pagination_number = SiteFunction::getPaginationPage();
        $data_blog = Blog::get_list_data($pagination_number);
        $total_number_page = SiteFunction::getTotalNumberPage('blog', $data['lang']);
        $pagination = new Pagination($total_number_page, $pagination_number,
			self::NUMBER_ARTICLE_ON_PAGE, 'page-');
        if (count($data_direction_id['direction_id']) != 0) {
            $data_direction = Direction::getDataArrId($data_direction_id['direction_id']);
        } else {
            $data_direction = [];
        }
        require_once(ROOT . "/views/blog/category.php");
        return true;
    }
}
