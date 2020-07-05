<?php

class staticPage
{
    const NAME_DB = 'static_page';
    public static function get_data($template)
    {
        $db = Db::getConnection();
        $data = array();
        $lang = SiteFunction::getLang();
        $result = $db->query("SELECT * FROM " . self::NAME_DB . " where status='1' AND lang='" . $lang . "' AND template='" . $template . "'");
        $i = 0;
        while ($row = $result->fetch()) {
            $data['id'] = $row["id"];
            $data['short_desc'] = $row["short_desc"];
            $data['json_content'] = json_decode($row["json_content"], true);
            $data['title'] = $row["title"];
            $data['post_title'] = $row["post_title"];
            $data['description'] = $row["description"];
            $data['permalink'] = $row["permalink"];
            $data['keywords'] = $row["keywords"];
            $data['ua_id'] = $row["ua_id"];
            $data['ru_id'] = $row["ru_id"];
            $data['en_id'] = $row["en_id"];
            $data['lang'] = $row['lang'];
            $i++;
        }
        if (is_array($data['json_content'])) {
            if (array_key_exists('slider_img', $data['json_content'])) {
                $data['json_content']['slider_img'] = SiteFunction::addAdminUrl($data['json_content']['slider_img']);
            }
        }
        if (is_array($data['json_content']) and array_key_exists('pluses', $data['json_content'])) {
            function addAdminUrl($item)
            {
                $item['src'] = SiteFunction::addAdminUrl($item['src']);
                return $item;
            }
            $data['json_content']['pluses'] = array_map('addAdminUrl', $data['json_content']['pluses']);
        }
        if (count($data) != 0) {
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
        $result = $db->query("SELECT `permalink` FROM " . self::NAME_DB . " where status='1' AND id='" . $id . "'");
        while ($row = $result->fetch()) {
            $data = $row['permalink'];
        }
        return $data;
    }
}
