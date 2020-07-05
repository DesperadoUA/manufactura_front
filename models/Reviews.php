<?php
class Reviews
{
    const SHOW_BY_DEFAULT = 20;
    const SHOW_BY_DEFAULT_CATEGORI = 6;
    const NAME_DB = 'reviews';
    public static function getDataByDirection($id)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT post_title, json_content FROM " . self::NAME_DB . " where status=1 AND direction_id=" . $id);
        $i = 0;
        while ($row = $result->fetch()) {
            $data['post_title'][$i] = $row['post_title'];
            $text = json_decode($row["json_content"], true);
            $data['text'][$i] = $text['main_content'];
            $i++;
        }
        return $data;
    }
    public static function getDataLastPosts($lang)
    {
        $db = Db::getConnection();
        $data = array();
        $lang = SiteFunction::getLang();
        $result = $db->query("SELECT post_title, json_content FROM " . self::NAME_DB . " WHERE status='1'" . " AND lang='" . $lang . "'" . " ORDER BY data DESC LIMIT " . self::SHOW_BY_DEFAULT);
        $i = 0;
        while ($row = $result->fetch()) {
            $data['post_title'][$i] = $row['post_title'];
            $text = json_decode($row["json_content"], true);
            $data['text'][$i] = $text['main_content'];
            $i++;
        }
        return $data;
    }
    public static function get_list_data($number_page)
    {
        if ($number_page != 0) $number_page--;
        $db = Db::getConnection();
        $lang = SiteFunction::getLang();
        $data = "";
        $result = $db->query("SELECT `post_title`, `short_desc`, `json_content` FROM " . self::NAME_DB . " where lang='" . $lang . "' ORDER BY data DESC LIMIT " . self::SHOW_BY_DEFAULT_CATEGORI . " OFFSET " . self::SHOW_BY_DEFAULT_CATEGORI * $number_page);
        $i = 0;
        while ($row = $result->fetch()) {
            $data['post_title'][$i] = $row['post_title'];
            $data['short_desc'][$i] = $row['short_desc'];
            $data['json_content'][$i] = json_decode($row['json_content']);
            $i++;
        }
        return $data;
    }
    public static function getUniqueDirectionId($lang)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT DISTINCT direction_id FROM " . self::NAME_DB . " WHERE status='1'" . " AND lang='" . $lang . "'");
        $i = 0;
        while ($row = $result->fetch()) {
            if ($row['direction_id'] != 0) $data['direction_id'][$i] = $row['direction_id'];
            $i++;
        }
        return $data;
    }
    public static function getUniqueStaffId($lang)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT DISTINCT staff_id FROM " . self::NAME_DB . " WHERE status='1'" . " AND lang='" . $lang . "'");
        $i = 0;
        while ($row = $result->fetch()) {
            if ($row['staff_id'] != 0) $data['staff_id'][$i] = $row['staff_id'];
            $i++;
        }
        return $data;
    }
}
