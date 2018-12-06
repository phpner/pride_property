<?php header('Content-type: text/html; charset=utf-8');?>

<?php 

setlocale(LC_ALL, "russian");
$monthes = array(
    1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
    5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
    9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
);

$data = (date('d ') . $monthes[(date('n'))] . date(' Y, H:i:s'));


if($_POST['name']){
    $name = trim(strip_tags($_POST['name']));
}else{
    $name = "";
}
if($_POST['tel']){
    $tel = trim(strip_tags($_POST['tel']));
}else{
    $tel  = "";
}



$body = "<br> Дата: $data <br> Имя: $name <br> тедефон: $tel " ;

require_once($_SERVER['DOCUMENT_ROOT'] . '/phpmailer/PHPMailerAutoload.php'); //подключаем класс
$mail = new PHPMailer(); //вызываем класс

$mail->CharSet = 'utf-8'; //Устанавливаем кодировку
$mail->From = 'Pride';

$mail->CharSet = 'utf-8';   //Устанавливаем кодировку
$mail->SetLanguage('ru');   //для ошибок итд.
$mail->addAddress("phpner@gmail.com","phpner"); //куда отправлять список через ","
$mail->FromName = 'Мой сайт';
$mail->Subject = "Pride";
$mail->Body = $body;
$mail->IsHTML(true);
//отправка 
if(!$mail->Send()) {
    echo 'false ';
    echo $mail->ErrorInfo;
} else {
    echo true;
}
/*header( 'Refresh: 0; url=http://kuban-hostel.ru/' );*/
/*exit;*/
?>