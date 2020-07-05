<?php

class Direction
{
    const NAME_DB = 'direction';
    public static function get_data()
    {
        $db = Db::getConnection();
        $data = array();
        $lang = SiteFunction::getLang();
        $url = SiteFunction::getPermalink();
        $result = $db->query("SELECT * FROM " . self::NAME_DB . " 
        where status='1' AND lang='" . $lang . "' AND permalink='" . $url . "'");
        $i = 0;
        while ($row = $result->fetch()) {
            $data['id'] = $row['id'];
            $data['json_content'] = json_decode($row["json_content"], true);
            $data['title'] = $row["title"];
            $data['description'] = $row["description"];
            $data['post_title'] = $row["post_title"];
            $data['keywords'] = $row["keywords"];
            $data['ua_id'] = $row["ua_id"];
            $data['ru_id'] = $row["ru_id"];
            $data['en_id'] = $row["en_id"];
            $data['lang'] = $row['lang'];
            $i++;
        }
        if (count($data) != 0) {
            $data['json_content']['img'] = SiteFunction::addAdminUrl($data['json_content']['img']);

            $data['ua_id'] !== 0
                ? $data['permalink_ua'] = self::getPermalink($data['ua_id'])
                : $data['permalink_ua'] = 0;

            $data['ru_id'] !== 0
                ? $data['permalink_ru'] = self::getPermalink($data['ru_id'])
                : $data['permalink_ru'] = 0;

            $data['en_id'] !== 0
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
    public static function getDataArrId($arr_id)
    {
        $db = Db::getConnection();
        $arr_id = implode(", ", $arr_id);
        $data = "";
        $result = $db->query("SELECT id, post_title FROM " . self::NAME_DB . " where id IN (" . $arr_id . ")");
        $i = 0;
        while ($row = $result->fetch()) {
            $data['post_title'][$i] = $row['post_title'];
            $data['id'][$i] = $row['id'];
            $i++;
        }
        return $data;
    }
    public static function getPermalinkPostTitleById($id)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT permalink, post_title FROM " . self::NAME_DB . " where id='" . $id . "'");
        $i = 0;
        $data = [];
        while ($row = $result->fetch()) {
            $data['post_title'] = $row['post_title'];
            $data['permalink'] = $row['permalink'];
            $i++;
        }
        return $data;
    }
}
