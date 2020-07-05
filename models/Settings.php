<?php

class Settings
{
    const NAME_DB = 'settings';
    public static function getDataMenuByLang($lang)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT json_content, location FROM " . self::NAME_DB . " WHERE lang = '" . $lang . "' 
        AND location IN ('menu_header', 'menu_footer_1', 'menu_footer_2', 'menu_main', 'footer_main_menu', 'footer_logos') ");
        while ($row = $result->fetch()) {
            $data['json_content'][] = json_decode($row["json_content"], true);
            $data['location'][] = $row['location'];
        }
        $data_menu['menu_header'] = $data['json_content'][0];
        $data_menu['menu_footer_1'] = $data['json_content'][1];
        $data_menu['menu_footer_2'] = $data['json_content'][2];
        $data_menu['menu_main'] = $data['json_content'][3];
        $data_menu['footer_main_menu'] = $data['json_content'][4];
        return $data_menu;
    }
    public static function getFormsData($lang)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT json_content FROM " . self::NAME_DB . " WHERE lang = '" . $lang . "' AND location = 'form'");
        while ($row = $result->fetch()) {
            $data['json_content'] = json_decode($row["json_content"], true);
        }
        if (array_key_exists('json_content', $data)) {
			$data_form['list_direction'] = $data['json_content']['menu_anchor'];
		}
        else $data_form = [];
        return $data_form;
    }
	public static function getFooterLogos($lang)
	{
		$db = Db::getConnection();
		$data = [];
		$result = $db->query("SELECT json_content FROM " . self::NAME_DB .
			" WHERE lang = '" . $lang . "' AND location = 'footer_logos'");
		while ($row = $result->fetch()) {
			$data['json_content'] = json_decode($row["json_content"], true);
		}
		if (array_key_exists('json_content', $data)) {
			function addAdminUrlSrc($item)
			{
				$item['src'] = SiteFunction::addAdminUrl($item['src']);
				return $item;
			}
			$data_footer_logos = array_map('addAdminUrlSrc', $data['json_content']['logos']);
		}
		else $data_footer_logos = [];
		return $data_footer_logos;
	}
	public static function getRedirects(){
		$db = Db::getConnection();
		$data = [];
		$result = $db->query("SELECT json_content FROM " . self::NAME_DB . " WHERE location = 'redirects'");
		while ($row = $result->fetch()) {
			$data['json_content'] = json_decode($row["json_content"], true);
		}
		return $data['json_content']['redirects'];
	}
}
