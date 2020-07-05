<?php

class JobController
{
    const NUMBER_ARTICLE_ON_PAGE = 6;
    public function actionIndex()
    {
        $data = Job::get_data();
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_blog = Blog::getDataLastPosts($data['lang'], 2);
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
        $data = staticPage::get_data("job");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
        $data_form = Settings::getFormsData($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        $data_job = Job::get_list_data();
        $pagination_number = SiteFunction::getPaginationPage();
        $total_number_page = SiteFunction::getTotalNumberPage('job', $data['lang']);
        $pagination = new Pagination($total_number_page, $pagination_number, self::NUMBER_ARTICLE_ON_PAGE, 'page-');
        require_once(ROOT . "/views/job/category.php");
        return true;
    }
}
