<?php

class Price
{
    const NAME_DB = 'price';

    public static function getMultipleDataById($name_column, $id)
    {
        $db = Db::getConnection();
        $price = [];
        $result = $db->query("SELECT json_content FROM " . self::NAME_DB . " where status=1 AND " . $name_column . " LIKE '%" . "!" . $id . "!" . "%'");
        while ($row = $result->fetch()) {
            $data = json_decode($row["json_content"], true);
            $price['menuLink'][] = $data[0]['menuLink'];
            $price['menuAnchor'][] = $data[0]['menuAnchor'];
            $price['menuChildren'][] = $data[0]['menuChildren'];
        }
        return $price;
    }
}
