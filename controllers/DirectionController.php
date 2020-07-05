<?php

class DirectionController
{
    const SHOW_ARTICLE_NUMBER = 3;
    public function actionIndex()
    {
        $data = Direction::get_data();
        if (count($data) != 0) {
            $data_form = Settings::getFormsData($data['lang']);
            $data_menu = Settings::getDataMenuByLang($data['lang']);
            $data_footer_logos = Settings::getFooterLogos($data['lang']);
            $data_shares = Shares::getBannerDirection($data['id']);
            if (array_key_exists('banner_direction', $data_shares)) {
                $data['json_content']['slider_img'] = SiteFunction::addAdminUrl($data_shares['banner_direction']);
                $data['json_content']['slider_permalink'] = $data_shares['banner_link'];
            }
            $data_relativ_services = Services::getDataByDirection($data['id']);
            $id_surgery = ["47", "48", "49"];
            if (in_array($data['id'], $id_surgery)) {
                $support['post_title'] = [];
                $support['permalink'] = [];
                if ($data['id'] === "47") {
                    $support['post_title'] = [
                        "Загальна хірургія",
						"Нейрохірургія",
						"Торакальна хірургія",
						"Хірургічна ортопедія та травматологія",
						"Оперативна гінекологія",
                        "Пластична хірургія",
						"Оперативна проктологія",
						"Флебологія"
                    ];
                    $support['permalink'] = [
                        "/direction/zagalna-hirurgia/",
						"/direction/nejrohirurgiya/",
						"/direction/torakalna-hirurgiya/",
						"/direction/hirurgichna-ortopediya-ta-travmatologiya/",
						"/direction/operativna-ginekologiya/",
						"/direction/plastichna-hirurgiya/",
						"/direction/operativna-proktologiya/",
						"/direction/flebologiya/"
                    ];
                } elseif ($data['id'] === "48") {
                    $support['post_title'] = [
                        "Общая хирургия",
						"Нейрохирургия",
						"Торакальная хирургия",
						"Хирургическая ортопедия и травматология",
						"Оперативная гинекология",
                        "Пластическая хирургия",
						"Оперативная проктология", "Флебология"
                    ];

                    $support['permalink'] = [
                    	"/ru/direction/obshhaya-hirurgiya/",
						"/ru/direction/nejrohirurgiya/",
						"/ru/direction/torakalnaya-hirurgiya/",
						"/ru/direction/hirurgicheskaya-ortopediya-i-travmatologiya/",
						"/ru/direction/operativnaya-ginekologiya/",
						"/ru/direction/plasticheskaya-hirurgiya/",
						"/ru/direction/operativnaya-proktologiya/",
						"/ru/direction/flebologiya/"
					];
                } elseif ($data['id'] === "49") {
                    $support['post_title'] = [
                        "General surgery",
						"Neurosurgery",
						"Thoracic surgery",
						"Surgical orthopedics and traumatology",
						"Gynecologic surgery"
                    ];
                    $support['permalink'] = [
                    	"/en/direction/general-surgery/",
						"#",
						"#",
						"/en/direction/surgical-orthopedics-and-traumatology/",
						"#"];
                }
                if (array_key_exists('post_title', $data_relativ_services)) {
                    $data_relativ_services['post_title'] = array_merge($support['post_title'], $data_relativ_services['post_title']);
                    $data_relativ_services['permalink'] = array_merge($support['permalink'], $data_relativ_services['permalink']);
                } else {
                    $data_relativ_services['post_title'] = $support['post_title'];
                    $data_relativ_services['permalink'] = $support['permalink'];
                }
            }
            $data_reviews = Reviews::getDataByDirection($data['id']);
            $data_doc = Staff::getDataByDirection($data['id']);
            $data_blog = Blog::getDataLastPostsByDirection($data['lang'], self::SHOW_ARTICLE_NUMBER, $data['id']);
            $data_price = Price::getMultipleDataById('direction_id', $data['id']);
            require_once(ROOT . "/views/direction/index.php");
        } else {
            SiteFunction::error_404();
        }
        return true;
    }
    public function actionCategory()
    {
        require_once(ROOT . "/views/direction/category.php");
        return true;
    }
}
