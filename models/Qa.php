<?php

class Qa
{
    const SHOW_BY_DEFAULT_CATEGORI = 3;
    const NAME_DB = 'qa';
    public static function get_data($number_page)
    {
        if ($number_page != 0) $number_page--;
        $db = Db::getConnection();
        $data = array();
        $lang = SiteFunction::getLang();
        $result = $db->query("SELECT * FROM " . self::NAME_DB . " WHERE status='1'" . " AND lang='" . $lang . "'" . " ORDER BY data DESC LIMIT " . self::SHOW_BY_DEFAULT_CATEGORI . " OFFSET " . self::SHOW_BY_DEFAULT_CATEGORI * $number_page);
        $i = 0;
        while ($row = $result->fetch()) {
            $data[$i]['post_title'] = $row["post_title"];
            $data[$i]['json_content'] = json_decode($row["json_content"], true);
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
}
