<?php
include '../initial.php';
include '../components/Db.php';
include '../models/Partners.php';
$type = $_POST['type'];
$lang = $_POST['lang'];
$counter = $_POST['counter'];

if ($lang === 'ru') $lang = 1;
if ($lang === 'en') $lang = 2;
if ($lang === 'ua') $lang = 3;

switch ($type) {
    case ('totalNumber'): {
            $data = Partners::get_total_number_posts($lang);
            echo  json_encode($data);
            break;
        }
    case ('getPosts'): {
            $data = Partners::get_list_data($counter, $lang);
            echo  json_encode($data);
            break;
        }
}
