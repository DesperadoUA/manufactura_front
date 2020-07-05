<?php
include '../initial.php';
include '../components/Db.php';

$typeFound = $_POST['typeFound'];
$lang = $_POST['lang'];
$findWorld = $_POST['findWorld'];

if ($lang === 'ru') $lang = 1;
if ($lang === 'en') $lang = 2;
if ($lang === 'ua') $lang = 3;

switch ($typeFound) {
    case ("direction"): {
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT permalink, post_title, img, short_desc FROM `direction` where status='1' AND lang='" . $lang . "' AND concat(post_title, short_desc, json_content) LIKE '%" . $findWorld . "%'");
            $i = 0;
            while ($row = $result->fetch()) {
                $data['permalink'][$i] = $row['permalink'];
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['img'][$i] = ADMIN_URL . $row['img'];
                $i++;
            }
            echo json_encode($data);
            break;
        }
    case ("services"): {
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT permalink, post_title, img, short_desc FROM `services` where status='1' AND lang='" . $lang . "' AND concat(post_title, short_desc, json_content) LIKE '%" . $findWorld . "%'");
            $i = 0;
            while ($row = $result->fetch()) {
                $data['permalink'][$i] = $row['permalink'];
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['img'][$i] = ADMIN_URL . $row['img'];
                $i++;
            }
            echo json_encode($data);
            break;
        }
    case ("special"): {
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT permalink, post_title, img, short_desc FROM `staff` where status='1' AND lang='" . $lang . "' AND desc_doc LIKE '%" . $findWorld . "%'");
            $i = 0;
            while ($row = $result->fetch()) {
                $data['permalink'][$i] = $row['permalink'];
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['img'][$i] = ADMIN_URL . $row['img'];
                $i++;
            }
            echo json_encode($data);
            break;
        }
    case ("post_title_doc"): {
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT permalink, post_title, img, short_desc, expirience FROM `staff` where status='1' AND lang='" . $lang . "' AND post_title LIKE '%" . $findWorld . "%'");
            $i = 0;
            while ($row = $result->fetch()) {
                $data['permalink'][$i] = $row['permalink'];
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['img'][$i] = ADMIN_URL . $row['img'];
                $data['expirience'][$i] = $row['expirience'];
                $i++;
            }
            echo json_encode($data);
            break;
        }
    case ("staff-direction"): {
            $findId = $_POST['findId'];
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT permalink, post_title, img, short_desc, expirience 
               FROM `staff` where status='1'  AND direction_id  LIKE '%!" . $findId . "!%'");
            while ($row = $result->fetch()) {
                $data['permalink'][] = $row['permalink'];
                $data['post_title'][] = $row['post_title'];
                $data['short_desc'][] = $row['short_desc'];
                $data['img'][] = ADMIN_URL . $row['img'];
                $data['expirience'][] = $row['expirience'];
            }
            echo json_encode($data);
            break;
        }
    case ("shares-direction"): {
            $findId = $_POST['findId'];
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT post_title, short_desc, permalink, data_field, img FROM `shares` where status='1'  AND direction_id LIKE '%!" . $findId . "!%'");
            $i = 0;
            while ($row = $result->fetch()) {
                $data['permalink'][$i] = $row['permalink'];
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['img'][$i] = ADMIN_URL . $row['img'];
                $data['data_field'][$i] = $row['data_field'];
                $i++;
            }
            echo json_encode($data);
            break;
        }
    case ("qa-direction"): {
            $findId = $_POST['findId'];
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT post_title, json_content FROM `qa` where status='1'  AND direction_id='" . $findId . "'");
            $i = 0;
            while ($row = $result->fetch()) {
                $data['post_title'][$i] = $row["post_title"];
                $data['json_content'][$i] = json_decode($row["json_content"], true);
                $i++;
            }
            echo json_encode($data);
            break;
        }
    case ("blog-direction"): {
            $findId = $_POST['findId'];
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT post_title, short_desc, permalink, data_field, img 
                 FROM `blog` where status='1'  AND direction_id LIKE '%!" . $findId . "!%'");
            while ($row = $result->fetch()) {
                $data['post_title'][] = $row['post_title'];
                $data['short_desc'][] = $row['short_desc'];
                $data['permalink'][] = $row['permalink'];
                $data['data_field'][] = $row['data_field'];
                $data['img'][] = ADMIN_URL . $row['img'];
            }
            echo json_encode($data);
            break;
        }
    case ("news-direction"): {
            $findId = $_POST['findId'];
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT post_title, short_desc, permalink, data_field, img 
               FROM `news` where status='1'  AND direction_id LIKE '%!" . $findId . "!%'");

            while ($row = $result->fetch()) {
                $data['post_title'][] = $row['post_title'];
                $data['short_desc'][] = $row['short_desc'];
                $data['permalink'][] = $row['permalink'];
                $data['data_field'][] = $row['data_field'];
                $data['img'][] = ADMIN_URL . $row['img'];
            }
            echo json_encode($data);
            break;
        }
    case ("programs-direction"): {
            $findId = $_POST['findId'];
            $typePost = $_POST['typePost'];
            $db = Db::getConnection();
            $data = array();
            if ($typePost === 'all') {
                $result = $db->query("SELECT post_title, short_desc, permalink, data_field, img 
                FROM `programs` where status='1'  AND direction_id LIKE '%!" . $findId . "!%'");
            } else {
                $result = $db->query("SELECT post_title, short_desc, permalink, data_field, img 
                FROM `programs` where status='1'  
                AND direction_id LIKE '%!" . $findId . "!%' AND tipe='" . $typePost . "'");
            }
            while ($row = $result->fetch()) {
                $data['post_title'][] = $row['post_title'];
                $data['permalink'][] = $row['permalink'];
                $data['short_desc'][] = $row['short_desc'];
                $data['data_field'][] = $row['data_field'];
                $data['img'][] = ADMIN_URL . $row['img'];
            }
            echo json_encode($data);
            break;
        }
    case ("globalFound"): {
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT permalink, post_title, img, short_desc FROM staff  where status='1' AND lang='" . $lang . "' AND concat(post_title, short_desc, json_content) LIKE '%" . $findWorld . "%'");
            $i = 0;
            while ($row = $result->fetch()) {
                $data['permalink'][$i] = $row['permalink'];
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['img'][$i] = ADMIN_URL . $row['img'];
                $i++;
            }

            $result = $db->query("SELECT permalink, post_title, img, short_desc FROM services  where status='1' AND lang='" . $lang . "' AND concat(post_title, short_desc, json_content) LIKE '%" . $findWorld . "%'");
            while ($row = $result->fetch()) {
                $data['permalink'][$i] = $row['permalink'];
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['img'][$i] = ADMIN_URL . $row['img'];
                $i++;
            }

            $result = $db->query("SELECT permalink, post_title, img, short_desc FROM direction  where status='1' AND lang='" . $lang . "' AND concat(post_title, short_desc, json_content) LIKE '%" . $findWorld . "%'");
            while ($row = $result->fetch()) {
                $data['permalink'][$i] = $row['permalink'];
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['img'][$i] = ADMIN_URL . $row['img'];
                $i++;
            }

            $result = $db->query("SELECT permalink, post_title, img, short_desc FROM blog  where status='1' AND lang='" . $lang . "' AND concat(post_title, short_desc, json_content) LIKE '%" . $findWorld . "%'");
            while ($row = $result->fetch()) {
                $data['permalink'][$i] = $row['permalink'];
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['img'][$i] = ADMIN_URL . $row['img'];
                $i++;
            }

            $result = $db->query("SELECT permalink, post_title, img, short_desc FROM news  where status='1' AND lang='" . $lang . "' AND concat(post_title, short_desc, json_content) LIKE '%" . $findWorld . "%'");
            while ($row = $result->fetch()) {
                $data['permalink'][$i] = $row['permalink'];
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['img'][$i] = ADMIN_URL . $row['img'];
                $i++;
            }

            echo json_encode($data);
            break;
        }
    case ("reviews-direction"): {
            $findId = $_POST['findId'];
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT post_title, short_desc, json_content FROM `reviews` where status='1'  AND direction_id='" . $findId . "'");
            $i = 0;
            while ($row = $result->fetch()) {
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['json_content'][$i] = json_decode($row['json_content']);
                $i++;
            }
            echo json_encode($data);
            break;
        }
    case ("reviews-staff"): {
            $findId = $_POST['findId'];
            $db = Db::getConnection();
            $data = array();
            $result = $db->query("SELECT post_title, short_desc, json_content FROM `reviews` where status='1'  AND staff_id='" . $findId . "'");
            $i = 0;
            while ($row = $result->fetch()) {
                $data['post_title'][$i] = $row['post_title'];
                $data['short_desc'][$i] = $row['short_desc'];
                $data['json_content'][$i] = json_decode($row['json_content']);
                $i++;
            }
            echo json_encode($data);
            break;
        }
}
