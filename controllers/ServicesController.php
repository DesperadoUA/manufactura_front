<?php

class ServicesController
{
    public function actionIndex()
    {
        $data = Services::get_data();
        if (count($data) != 0) {
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_doc = Staff::getDataByServices($data['id']);
			$data_footer_logos = Settings::getFooterLogos($data['lang']);
            $data_shares = Shares::getDataByServices($data['id']);
            $data_form = Settings::getFormsData($data['lang']);
            if (array_key_exists('banner_direction', $data_shares)) {
                $data['json_content']['slider_img'] = SiteFunction::addAdminUrl($data_shares['banner_direction']);
                $data['json_content']['slider_permalink'] = $data_shares['banner_link'];
            }
            $data_price = Price::getMultipleDataById('services_id', $data['id']);
            require_once(ROOT . "/views/services/index.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }

    public function actionCategory()
    {
        require_once(ROOT . "/views/services/category.php");
        return true;
    }
}
