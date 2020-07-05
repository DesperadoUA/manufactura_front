<?php

class Shares
{
    const SHOW_BY_DEFAULT_CATEGORI = 6;
    const NAME_DB = 'shares';
    const DEFAULT_BANNER_PATH = '/template/images/shares_default.jpg';
    public static function get_data()
    {
        $db = Db::getConnection();
        $data = array();
        $lang = SiteFunction::getLang();
        $url = SiteFunction::getPermalink();
        $result = $db->query("SELECT * FROM " . self::NAME_DB . "
         where status='1' AND lang='" . $lang . "' AND permalink='" . $url . "'");

        while ($row = $result->fetch()) {
            $data['json_content'] = json_decode($row["json_content"], true);
            $data['title'] = $row["title"];
            $data['description'] = $row["description"];
            $data['post_title'] = $row["post_title"];
            $data['keywords'] = $row["keywords"];
            $data['lang'] = $row["lang"];
            $data['ua_id'] = $row["ua_id"];
            $data['ru_id'] = $row["ru_id"];
            $data['en_id'] = $row["en_id"];
        }
        if (count($data) != 0) {
        	if(!array_key_exists('img', $data['json_content'])) {
				$data['json_content']['img'] = SiteFunction::addAdminUrl(self::DEFAULT_BANNER_PATH);
			}
			else {
				$data['json_content']['img'] = SiteFunction::addAdminUrl($data['json_content']['img']);
			}
            $data['ua_id'] != 0
                ? $data['permalink_ua'] = self::getPermalink($data['ua_id'])
                : $data['permalink_ua'] = 0;

            $data['ru_id'] != 0
                ? $data['permalink_ru'] = self::getPermalink($data['ru_id'])
                : $data['permalink_ru'] = 0;

            $data['en_id'] != 0
                ? $data['permalink_en'] = self::getPermalink($data['en_id'])
                : $data['permalink_en'] = 0;
        }
        return $data;
    }
    private static function getPermalink($id)
    {
        $db = Db::getConnection();
        $data = "";
        $result = $db->query("SELECT `permalink` FROM " . self::NAME_DB . " where id='" . $id . "'");
        while ($row = $result->fetch()) {
            $data = $row['permalink'];
        }
        return $data;
    }
    public static function get_list_data($number_page)
    {
        if ($number_page != 0) $number_page--;
        $db = Db::getConnection();
        $lang = SiteFunction::getLang();
        $data = [];
        $result = $db->query("SELECT `post_title`, `short_desc`, `permalink`, `data_field`, `img` FROM "
			. self::NAME_DB . " where lang='" . $lang . "' ORDER BY data DESC LIMIT " . self::SHOW_BY_DEFAULT_CATEGORI . " OFFSET " . self::SHOW_BY_DEFAULT_CATEGORI * $number_page);
        $i = 0;
        while ($row = $result->fetch()) {
            $data['post_title'][$i] = $row['post_title'];
            $data['short_desc'][$i] = $row['short_desc'];
            $data['permalink'][$i] = $row['permalink'];
            $data['data_field'][$i] = $row['data_field'];
            $data['img'][$i] = ADMIN_URL . $row['img'];
            $i++;
        }
        return $data;
    }
    public static function getUniqueDirectionId($lang)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT direction_id FROM "
			. self::NAME_DB . " WHERE status='1'" . " AND lang='" . $lang . "'");
        $data['direction_id'] = [];
        while ($row = $result->fetch()) {
            if ($row['direction_id'] !== "[]") {
                $data['direction_id'] = array_merge($data['direction_id'], json_decode(str_replace("!", "", $row['direction_id'])));
            }
        }
        $data['direction_id'] = array_unique($data['direction_id']);
        return $data;
    }
    public static function getBannerDirection($direction_id)
    {
        $currentDate = date("Y-m-d");
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT 
              banner_direction, 
              banner_date, 
              banner_link 
              FROM "
			. self::NAME_DB . " where direction_id LIKE '%" . "!" . $direction_id . "!" . "%' AND status=1");
        while ($row = $result->fetch()) {
            if (strtotime($row['banner_date']) >= strtotime($currentDate)) {
                if ($row['banner_direction'] != "0") {
                    $data['banner_direction'][] = $row['banner_direction'];
                    $data['banner_link'][] = $row['banner_link'];
                }
            }
        }
        return $data;
    }
    public static function getDataByServices($id)
    {
        $currentDate = date("Y-m-d");
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT 
                  banner_direction,
                  banner_date,
                  banner_link 
                   FROM "
			. self::NAME_DB . " where status=1 AND services_id LIKE '%" . "!" . $id . "!" . "%'");
        while ($row = $result->fetch()) {
            if (strtotime($row['banner_date']) >= strtotime($currentDate)) {
                if ($row['banner_direction'] != "0") {
                    $data['banner_direction'][] = $row['banner_direction'];
					$data['banner_link'][] = $row['banner_link'];
                }
            }
        }
        return $data;
    }
    public static function getDataMainSlider($lang)
    {
        $currentDate = date("Y-m-d");
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT 
           banner_main, 
           banner_text_1, 
           banner_text_2, 
           banner_text_3, 
           banner_date, 
           show_main_page,
           banner_link
            FROM " . self::NAME_DB . " WHERE status='1'" . " AND lang='" . $lang . "' ORDER BY data DESC");

        while ($row = $result->fetch()) {
            if (strtotime($row['banner_date']) >= strtotime($currentDate)) {
                if ($row['banner_main'] != "0" and $row['show_main_page']) {
                    $data['banner_main'][] = $row['banner_main'];
                    $data['banner_text_1'][] = $row['banner_text_1'];
                    $data['banner_text_2'][] = $row['banner_text_2'];
                    $data['banner_text_3'][] = $row['banner_text_3'];
                    $data['banner_date'][] = $row['banner_date'];
					$data['banner_link'][] = $row['banner_link'];
                }
            }
        }
        return $data;
    }
}
