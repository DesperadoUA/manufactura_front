<?php
class SiteFunction
{
    public static function getLang()
    {
        $url = $_SERVER['REQUEST_URI'];

        if (strpos($url, '/ru/') === 0) {
            $lang = 1;
        } else if (strpos($url, '/en/') === 0) {
            $lang = 2;
        } else {
            $lang = 3;
        }

        return $lang;
    }
    public static function getPaginationPage()
    {
        $number_page = "";
        $lang = self::getLang();
        $url = explode("/", $_SERVER['REQUEST_URI']);
        if ($lang == 3) {
            count($url) == 3
                ? $number_page = 0
                : $number_page = explode('-', $url[2])[1];
        } else {
            count($url) == 4
                ? $number_page = 0
                : $number_page = explode('-', $url[3])[1];
        }
        return $number_page;
    }
    public static function getTotalNumberPage($template, $lang)
    {
        $db = Db::getConnection();
        $data = [];
        $result = $db->query("SELECT COUNT(1) FROM `" . $template . "` WHERE status='1'" . " AND lang='" . $lang . "'")->fetchColumn();
        return $result;
    }
    public static function getPermalink()
    {
		$url = explode('?', $_SERVER['REQUEST_URI'], 2);
		$url = $url[0];
        return $url;
    }
    public static function addAdminUrl($value)
    {
        if (is_array($value)) {
            for ($i = 0; $i < count($value); $i++) {
                $value[$i] = ADMIN_URL . $value[$i];
            }
            return $value;
        }
        if (is_string($value)) return ADMIN_URL . $value;
    }
    public static function error_404()
    {
        $data = staticPage::get_data("404");
        $data_menu = Settings::getDataMenuByLang($data['lang']);
		$data_footer_logos = Settings::getFooterLogos($data['lang']);
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        require_once(ROOT . "/views/site/404.php");
        return true;
    }
}
