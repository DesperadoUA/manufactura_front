<?php

class SiteController
{
    const SHOW_ARTICLE_NUMBER_MAIN_PAGE = 2;
    const SHOW_PROGRAM_NUMBER_MAIN_PAGE = 4;
    const SHOW_ARTICLE_NUMBER_PROF_PAGE = 3;
    const SHOW_ARTICLE_NUMBER_QA_PAGE = 3;
    const SHOW_PARTNERS_NUMBER_START = 0;
    const SHOW_EXAMINATION_NUMBER_START = 0;
    public function actionIndex()
    {
        $data = staticPage::get_data("main");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_form = Settings::getFormsData($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        if (count($data) != 0) {
            $data_doc = Staff::getDataLastPosts($data['lang']);
            $data_blog = Blog::getDataLastPosts($data['lang'], self::SHOW_ARTICLE_NUMBER_MAIN_PAGE);
            $data_news = News::getDataLastPosts($data['lang'], self::SHOW_ARTICLE_NUMBER_MAIN_PAGE);
            $data_programs_adult = Programs::getDataLastPosts($data['lang'], "adult", self::SHOW_PROGRAM_NUMBER_MAIN_PAGE);
            $data_programs_children = Programs::getDataLastPosts($data['lang'], "children", self::SHOW_PROGRAM_NUMBER_MAIN_PAGE);
            $data_main_slider = Shares::getDataMainSlider($data['lang']);
            if (count($data_main_slider) !== 0) {
				$data_main_slider['banner_main'] = SiteFunction::addAdminUrl($data_main_slider['banner_main']);
			}
            require_once(ROOT . "/views/site/index.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }
    public function actionAbout()
    {
        $data = staticPage::get_data("about");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_form = Settings::getFormsData($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        if (count($data) != 0) {
            $data_reviews = Reviews::getDataLastPosts($data['lang']);
            $data_doc = Staff::getDataLastPosts($data['lang']);
            $data_job = Job::getDataLastPosts($data['lang']);
            require_once(ROOT . "/views/site/about.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }
    public function actionProf()
    {
        $url = $_SERVER['REQUEST_URI'];
        $template = '';
        if (strpos($url, 'health-examinations')) $template = 'examination_employee';
        if (strpos($url, 'health-certificates')) $template = 'medical_information';
        if (strpos($url, 'medical-cards')) $template = 'medical_books';

        $data = staticPage::get_data($template);
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_form = Settings::getFormsData($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        $data_examination = Examination::get_list_data(self::SHOW_EXAMINATION_NUMBER_START, $template, $data['lang']);
        if (count($data) != 0) {
            require_once(ROOT . "/views/site/prof.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }
    public function actionQa()
    {
        $data = staticPage::get_data("qa");
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_form = Settings::getFormsData($data['lang']);
			$data_footer_logos = Settings::getFooterLogos($data['lang']);
            $pagination_number = SiteFunction::getPaginationPage();
            $data_qa = Qa::get_data($pagination_number);
            $total_number_page = SiteFunction::getTotalNumberPage('qa', $data['lang']);
            $pagination = new Pagination($total_number_page, $pagination_number, self::SHOW_ARTICLE_NUMBER_QA_PAGE, 'page-');
            $data_direction_id = Qa::getUniqueDirectionId($data['lang']);
            if (count($data_direction_id) != 0) {
                $data_direction = Direction::getDataArrId($data_direction_id['direction_id']);
            } else {
                $data_direction = [];
            }
            require_once(ROOT . "/views/site/qa.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }
    public function actionContact()
    {
        $data = staticPage::get_data("contact");
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_form = Settings::getFormsData($data['lang']);
			$data_footer_logos = Settings::getFooterLogos($data['lang']);
            require_once(ROOT . "/views/site/contact.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }
    public function actionPartners()
    {
        $data = staticPage::get_data("partners");
        $data_partners = Partners::get_list_data(self::SHOW_PARTNERS_NUMBER_START, $data['lang']);
        if (count($data_partners) !== 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_form = Settings::getFormsData($data['lang']);
			$data_footer_logos = Settings::getFooterLogos($data['lang']);
            for ($i = 0; $i < count($data_partners['post_title']); $i++) {
                $data['partners']['post_title'][] = $data_partners['post_title'][$i];
                $data['partners']['img'][] = $data_partners['img'][$i];
                $data['partners']['main_content'][] = $data_partners['json_content'][$i]['main_content'];
                $data['partners']['location'][] = $data_partners['short_desc'][$i];
            }
        }
        if (count($data) != 0) require_once(ROOT . "/views/site/partners.php");
        else SiteFunction::error_404();
        return true;
    }
    public function actionPrice()
    {
        $data = staticPage::get_data("price");
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_form = Settings::getFormsData($data['lang']);
			$data_footer_logos = Settings::getFooterLogos($data['lang']);
            require_once(ROOT . "/views/site/price.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }
    public function actionSearch()
    {
        $data = staticPage::get_data("search");
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_form = Settings::getFormsData($data['lang']);
			$data_footer_logos = Settings::getFooterLogos($data['lang']);
            require_once(ROOT . "/views/site/search.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }
    public function action404()
    {
        SiteFunction::error_404();
    }
}
