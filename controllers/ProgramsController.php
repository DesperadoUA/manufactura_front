<?php

class ProgramsController
{
    const NUMBER_ARTICLE_ON_PAGE = 6;
    const NUMBER_ARTICLE_ON_INDEX = 2;
    public function actionIndex()
    {
        $data = Programs::get_data();
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_form = Settings::getFormsData($data['lang']);
			$data_footer_logos = Settings::getFooterLogos($data['lang']);
            $data['last_posts'] = Programs::getDataLastPosts($data['lang'], $data['tipe'], self::NUMBER_ARTICLE_ON_INDEX);
            require_once(ROOT . "/views/programs/index.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }
    public function actionCategory()
    {
        $data = staticPage::get_data("programs");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_form = Settings::getFormsData($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        $data_direction_id = Programs::getUniqueDirectionId($data['lang']);

        $pagination_number = SiteFunction::getPaginationPage();
        $data_programs = Programs::get_list_data($pagination_number);
        $total_number_page = SiteFunction::getTotalNumberPage('programs', $data['lang']);
        $pagination = new Pagination($total_number_page, $pagination_number,
			self::NUMBER_ARTICLE_ON_PAGE, 'page-');

		if (count($data_direction_id['direction_id']) != 0) {
			$data_direction = Direction::getDataArrId($data_direction_id['direction_id']);
		} else {
			$data_direction = [];
		}
        require_once(ROOT . "/views/programs/category.php");
        return true;
    }
    public function actionChildren()
    {
        $data = staticPage::get_data("programs-children");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_direction_id = Programs::getUniqueDirectionIdTipe('children', $data['lang']);

		if (count($data_direction_id['direction_id']) != 0) {
			$data_direction = Direction::getDataArrId($data_direction_id['direction_id']);
		} else {
			$data_direction = [];
		}

        $pagination_number = SiteFunction::getPaginationPage();
        $total_number_page = Programs::getTotalNumberPage('children', $data['lang']);
        $pagination = new Pagination($total_number_page, $pagination_number, self::NUMBER_ARTICLE_ON_PAGE, 'page-');
        $data_programs = Programs::get_list_data_tipe("children", $pagination_number);
        require_once(ROOT . "/views/programs/category.php");
        return true;
    }
    public function actionAdults()
    {
        $data = staticPage::get_data("programs-adults");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_direction_id = Programs::getUniqueDirectionIdTipe('adult', $data['lang']);

		if (count($data_direction_id['direction_id']) != 0) {
			$data_direction = Direction::getDataArrId($data_direction_id['direction_id']);
		} else {
			$data_direction = [];
		}

        $pagination_number = SiteFunction::getPaginationPage();
        $total_number_page = Programs::getTotalNumberPage('adult', $data['lang']);
        $pagination = new Pagination($total_number_page, $pagination_number, self::NUMBER_ARTICLE_ON_PAGE, 'page-');
        $data_programs = Programs::get_list_data_tipe("adult", $pagination_number);
        require_once(ROOT . "/views/programs/category.php");
        return true;
    }
}
