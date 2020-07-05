<?php

class Partners
{
    const SHOW_BY_DEFAULT = 5;
    const NAME_DB = 'partners';
    public static function get_list_data($number_page, $lang)
    {
        if ($number_page != 0) $number_page--;
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT post_title, short_desc, img, json_content  FROM " . self::NAME_DB . " where lang='" . $lang . "' AND status='1' ORDER BY data DESC LIMIT " . self::SHOW_BY_DEFAULT . " OFFSET " . self::SHOW_BY_DEFAULT * $number_page);
        $i = 0;
        while ($row = $result->fetch()) {
            $data['post_title'][$i] = $row['post_title'];
            $data['short_desc'][$i] = $row['short_desc'];
            $data['img'][$i] = ADMIN_URL . $row['img'];
            $data['json_content'][$i] = json_decode($row["json_content"], true);
            $i++;
        }
        return $data;
    }
    public static function get_total_number_posts($lang)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT post_title  FROM " . self::NAME_DB . " where lang='" . $lang . "' AND status='1' ORDER BY data DESC");
        $i = 0;
        while ($row = $result->fetch()) {
            $data['post_title'][$i] = $row['post_title'];
            $i++;
        }
        return count($data['post_title']);
    }
}
