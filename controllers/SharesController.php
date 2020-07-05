<?php

class SharesController
{
    const NUMBER_ARTICLE_ON_PAGE = 6;
    public function actionIndex()
    {
        $data = Shares::get_data();
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_form = Settings::getFormsData($data['lang']);
			$data_footer_logos = Settings::getFooterLogos($data['lang']);
            require_once(ROOT . "/views/shares/index.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }

    public function actionCategory()
    {
        $data = staticPage::get_data("shares");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_form = Settings::getFormsData($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        $pagination_number = SiteFunction::getPaginationPage();
        $data_shares = Shares::get_list_data($pagination_number);
        $total_number_page = SiteFunction::getTotalNumberPage('shares', $data['lang']);
        $pagination = new Pagination($total_number_page, $pagination_number, self::NUMBER_ARTICLE_ON_PAGE, 'page-');

        $data_direction_id = Shares::getUniqueDirectionId($data['lang']);
        if (count($data_direction_id['direction_id']) != 0) {
            $data_direction = Direction::getDataArrId($data_direction_id['direction_id']);
        } else {
            $data_direction = [];
        }
        require_once(ROOT . "/views/shares/category.php");
        return true;
    }
}
