<?php

class Services
{
    const NAME_DB = 'services';
    public static function get_data()
    {
        $db = Db::getConnection();
        $data = array();
        $lang = SiteFunction::getLang();
        $url = SiteFunction::getPermalink();
        $result = $db->query("SELECT * FROM " . self::NAME_DB . " where status='1' AND lang='" . $lang . "' AND permalink='" . $url . "'");
        $i = 0;
        while ($row = $result->fetch()) {
            $data['json_content'] = json_decode($row['json_content'], true);
            $data['title'] = $row['title'];
            $data['description'] = $row['description'];
            $data['post_title'] = $row['post_title'];
            $data['keywords'] = $row['keywords'];
            $data['direction_id'] = $row['direction_id'];
            $data['ua_id'] = $row['ua_id'];
            $data['ru_id'] = $row['ru_id'];
            $data['en_id'] = $row['en_id'];
            $data['lang'] = $row['lang'];
            $data['id'] = $row['id'];
            $i++;
        }
        if (count($data) != 0) {
            if ($data['direction_id'] != 0) $data['direction'] = Direction::getPermalinkPostTitleById($data['direction_id']);
            $data['json_content']['img'] = SiteFunction::addAdminUrl($data['json_content']['img']);
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
    public static function getDataByDirection($id)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT post_title, permalink FROM " . self::NAME_DB . " where status=1 AND direction_id=" . $id);
        $i = 0;
        while ($row = $result->fetch()) {
            $data['post_title'][$i] = $row['post_title'];
            $data['permalink'][$i] = $row['permalink'];
            $i++;
        }
        return $data;
    }
}
