<?php

class StaffController
{
    const SHOW_ARTICLE_NUMBER_CATEGORY = 2;
    const SHOW_ARTICLE_NUMBER = 3;
    const NUMBER_ARTICLE_ON_PAGE = 8;
    public function actionIndex()
    {
        $data = Staff::get_data();
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_form = Settings::getFormsData($data['lang']);
			$data_footer_logos = Settings::getFooterLogos($data['lang']);
            $data_blog = Blog::getDataLastPosts($data['lang'], self::SHOW_ARTICLE_NUMBER);
            require_once(ROOT . "/views/staff/index.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }
    public function actionCategory()
    {
        $data = staticPage::get_data("staff");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_form = Settings::getFormsData($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        $pagination_number = SiteFunction::getPaginationPage();
        $data_staff = Staff::get_list_data($pagination_number);
        $total_number_page = SiteFunction::getTotalNumberPage('staff', $data['lang']);
        $pagination = new Pagination($total_number_page, $pagination_number, self::NUMBER_ARTICLE_ON_PAGE, 'page-');
        $data_blog = Blog::getDataLastPosts($data['lang'], self::SHOW_ARTICLE_NUMBER_CATEGORY);
        $data_direction_id = Staff::getUniqueDirectionId($data['lang']);
		if (count($data_direction_id['direction_id']) != 0) {
			$data_direction = Direction::getDataArrId($data_direction_id['direction_id']);
		} else {
			$data_direction = [];
		}
        require_once(ROOT . "/views/staff/category.php");
        return true;
    }
}
