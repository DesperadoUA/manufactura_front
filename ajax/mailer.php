<?php
include '../initial.php';
include '../components/Db.php';

$db = Db::getConnection();
$data = array();
$result = $db->query("SELECT json_content FROM `settings` where template='emails'");
while ($row = $result->fetch()) {
	$data = json_decode($row['json_content'], true);
}
$form = $_POST['form'];

switch ($form) {
    case ("appointment"): {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $data_visit = $_POST['data'];
            $direction = $_POST['direction'];
            $comment = $_POST['comment'];

            $subject = "Записаться на прием, сайт manufactura";

            $message = "Name: " . $name . "\n\r";
            $message .= "Phone: " . $phone . "\n\r";
            $message .= "Email: " . $email . "\n\r";
            $message .= "Data: " . $data_visit . "\n\r";
            $message .= "Direction: " . $direction . "\n\r";
            $message .= "Comment: " . $comment . "\n\r";

            break;
        }
    case ("queshen"): {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];

            $subject = "Задать вопрос, сайт manufactura";

            $message = "Name: " . $name . "\r\n";
            $message .= "Email: " . $email . "\r\n";
            $message .= "Comment: " . $comment . "\r\n";

            break;
        }
    case ("main"): {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];
            $direction = $_POST['direction'];
            $tel = $_POST['tel'];
            $data_visit = $_POST['data'];

		    $subject = 'Главная форма записи на прием';

            $message = "Name: " . $name . "\n\r";
            $message .= "Email: " . $email . "\n\r";
            $message .= "Comment: " . $comment . "\n\r";
            $message .= "Direction: " . $direction . "\n\r";
            $message .= "Tel: " . $tel . "\n\r";
            $message .= "Data: " . $data_visit . "\n\r";

            break;
        }
    case ("reviews"): {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];

            $subject = "Отзыв, сайт manufactura";

            $message = "Name: " . $name . "\n\r";
            $message .= "Email: " . $email . "\n\r";
            $message .= "Comment: " . $comment . "\n\r";

            break;
        }
    case ("job"): {
            $name = $_POST['job_form_name'];
            $email = $_POST['job_form_email'];
            $phone = $_POST['job_form_tel'];
            $vacancy = $_POST['job_form_vacancy'];
            $comment = $_POST['job_form_comment'];
            if ($_FILES['job_form_file']['name']) {
                $file_tmp = $_FILES['job_form_file']['tmp_name'];
                $file_name = __DIR__ . "/uploads/" . time() .  $_FILES['job_form_file']['name'];
                $expensions = array('jpeg', "jpg", "png", 'doc', 'pdf');
                move_uploaded_file($_FILES['job_form_file']['tmp_name'], $file_name);
            }
            $support = explode('/ajax/', $file_name);
		    $link_vc = $_SERVER['SERVER_NAME'].'/ajax/'.$support[1];
            $subject = "Резюме, сайт manufactura";

            $message = "Name: " . $name . "\n\r";
            $message .= "Phone: " . $phone . "\n\r";
            $message .= "Email: " . $email . "\n\r";
            $message .= "Vacancy: " . $vacancy . "\n\r";
            $message .= "Link_vc: ". $link_vc ."\n\r";
            $message .= "Comment: " . $comment . "\n\r";

            break;
        }
}

$array_emails = explode(',', $data['emails'][$form]);
foreach ($array_emails as $item) mail($item, $subject, $message);
echo true;

