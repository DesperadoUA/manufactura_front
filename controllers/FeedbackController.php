<?php

class FeedbackController
{
    const NUMBER_ARTICLE_ON_PAGE = 6;
    public function actionCategory()
    {
        $data = staticPage::get_data("feedback");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_form = Settings::getFormsData($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        $pagination_number = SiteFunction::getPaginationPage();
        $data_feedback = Reviews::get_list_data($pagination_number);
        $total_number_page = SiteFunction::getTotalNumberPage('reviews', $data['lang']);
        $data_direction_id = Reviews::getUniqueDirectionId($data['lang']);
        if (count($data_direction_id) != 0) {
            $data_direction = Direction::getDataArrId($data_direction_id['direction_id']);
        } else {
            $data_direction = [];
        }
        $data_staff_id = Reviews::getUniqueStaffId($data['lang']);
        if (count($data_staff_id) != 0) {
            $data_staff = Staff::getDataArrId($data_staff_id['staff_id']);
        } else {
            $data_staff = [];
        }
        $pagination = new Pagination($total_number_page, $pagination_number, self::NUMBER_ARTICLE_ON_PAGE, 'page-');
        require_once(ROOT . "/views/feedback/category.php");
        return true;
    }
}
