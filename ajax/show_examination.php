<?php
include '../initial.php';
include '../components/Db.php';
include '../models/Examination.php';
$type = $_POST['type'];
$lang = $_POST['lang'];
$action = $_POST['action'];
$counter = $_POST['counter'];

if ($lang === 'ru') $lang = 1;
if ($lang === 'en') $lang = 2;
if ($lang === 'ua') $lang = 3;

switch ($action) {
    case ('totalNumber'): {
            $data = Examination::get_total_number_posts($lang, $type);
            echo  json_encode($data);
            break;
        }
    case ('getPosts'): {
            $data = Examination::get_list_data($counter, $type, $lang);
            echo  json_encode($data);
            break;
        }
}
