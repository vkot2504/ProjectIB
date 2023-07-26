<?php
//Сбор данных из полей формы. 
$name = $_POST['name'];// Берём данные из input c атрибутом name="name"
$phone = $_POST['phone']; // Берём данные из input c атрибутом name="phone"
$email = $_POST['email']; // Берём данные из input c атрибутом name="mail"
 
$token = "5712186244:AAGZVSvUWGGRuiR9tWcr4lCrvfuTHD51KMQ"; // Тут пишем токен
$chat_id = "-917386957"; // Тут пишем ID чата, куда будут отправляться сообщения
$sitename = "mezhanov.ru"; //Указываем название сайта
 
$arr = array(
 
  'Заказ с сайта: ' => $sitename,
  'Имя: ' => $name,
  'Телефон: ' => $phone,
  'Почта' => $email
);
 
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
 
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {
  header('Location: index.html');
} else {
  echo "Error";
}
?>
