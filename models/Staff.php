<?php

class Staff
{
    const SHOW_BY_DEFAULT = 1000;
    const SHOW_BY_DEFAULT_CATEGORY = 8;
    const NAME_DB = 'staff';
    public static function get_data()
    {
        $db = Db::getConnection();
        $data = array();
        $lang = SiteFunction::getLang();
        $url = SiteFunction::getPermalink();
        $result = $db->query("SELECT * FROM  " . self::NAME_DB . " where status=1 AND lang='" . $lang . "' AND permalink='" . $url . "'");
        $i = 0;
        while ($row = $result->fetch()) {
            $data['json_content'] = json_decode($row["json_content"], true);
            $data['title'] = $row["title"];
            $data['description'] = $row["description"];
            $data['post_title'] = $row["post_title"];
            $data['keywords'] = $row["keywords"];
            $data['desc_doc'] = $row["desc_doc"];
            $data['expirience'] = $row["expirience"];
            $data['img'] = $row["img"];
            $data['ua_id'] = $row["ua_id"];
            $data['ru_id'] = $row["ru_id"];
            $data['en_id'] = $row["en_id"];
            $data['lang'] = $row['lang'];
            $i++;
        }
        if (count($data) != 0) {
            $data['json_content']['img'] = SiteFunction::addAdminUrl($data['json_content']['img']);
            $data['json_content']['slider_img'] = SiteFunction::addAdminUrl($data['json_content']['slider_img']);

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
        $result = $db->query("SELECT `permalink` FROM  " . self::NAME_DB . " where id='" . $id . "'");
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
        $result = $db->query("SELECT `post_title`, `permalink`, `img`, `desc_doc`, `expirience` 
            FROM  " . self::NAME_DB . " where lang='" . $lang . "' and status=1 
            ORDER BY data DESC LIMIT " . self::SHOW_BY_DEFAULT_CATEGORY . " OFFSET "
			. self::SHOW_BY_DEFAULT_CATEGORY * $number_page);
        $i = 0;
        while ($row = $result->fetch()) {
            $data['post_title'][$i] = $row['post_title'];
            $data['desc_doc'][$i] = $row['desc_doc'];
            $data['permalink'][$i] = $row['permalink'];
            $data['expirience'][$i] = $row['expirience'];
            $data['img'][$i] = ADMIN_URL . $row['img'];
            $i++;
        }
        return $data;
    }
    public static function getDataByDirection($id)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT post_title, permalink, desc_doc, expirience, img FROM  
          " . self::NAME_DB . " where status=1 AND direction_id LIKE '%!" . $id . "!%'");

        while ($row = $result->fetch()) {
            $data['post_title'][] = $row['post_title'];
            $data['permalink'][] = $row['permalink'];
            $data['desc_doc'][] = $row['desc_doc'];
            $data['expirience'][] = $row['expirience'];
            $data['img'][] = ADMIN_URL . $row['img'];
        }
        return $data;
    }
    public static function getDataLastPosts($lang)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT post_title, permalink, desc_doc, expirience, img FROM  "
			. self::NAME_DB . " WHERE status=1" . " AND lang='" . $lang . "'" . " ORDER BY data DESC LIMIT "
			. self::SHOW_BY_DEFAULT);
        while ($row = $result->fetch()) {
            $data['post_title'][] = $row['post_title'];
            $data['permalink'][] = $row['permalink'];
            $data['desc_doc'][] = $row['desc_doc'];
            $data['expirience'][] = $row['expirience'];
            $data['img'][] = ADMIN_URL . $row['img'];
        }
        return $data;
    }
    public static function getDataByServices($id)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT post_title, permalink, desc_doc, expirience, img FROM  " . self::NAME_DB . " where status=1 AND services_id LIKE '%" . "!" . $id . "!" . "%'");

        while ($row = $result->fetch()) {
            $data['post_title'][] = $row['post_title'];
            $data['permalink'][] = $row['permalink'];
            $data['desc_doc'][] = $row['desc_doc'];
            $data['expirience'][] = $row['expirience'];
            $data['img'][] = ADMIN_URL . $row['img'];
        }
        return $data;
    }
    public static function getUniqueDirectionId($lang)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT DISTINCT direction_id FROM  "
			. self::NAME_DB . " WHERE status=1" . " AND lang='" . $lang . "'");
		$data['direction_id'] = [];
		while ($row = $result->fetch()) {
			if ($row['direction_id'] !== "[]") {
				$data['direction_id'] = array_merge($data['direction_id'],
					json_decode(str_replace("!", "", $row['direction_id'])));
			}
		}
		$data['direction_id'] = array_unique($data['direction_id']);
        return $data;
    }
    public static function getDataArrId($arr_id)
    {
        $db = Db::getConnection();
        $arr_id = implode(", ", $arr_id);
        $data = "";
        $result = $db->query("SELECT id, post_title FROM  " . self::NAME_DB . " where id IN (" . $arr_id . ")");
        $i = 0;
        while ($row = $result->fetch()) {
            $data['post_title'][$i] = $row['post_title'];
            $data['id'][$i] = $row['id'];
            $i++;
        }
        return $data;
    }
}
