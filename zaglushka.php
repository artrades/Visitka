<?php

echo "Имя написавшего: " . $_POST['User_name'] . '<br>';
echo "Почта написавшего: " . $_POST['User_email'] . '<br>';
echo "Сообщение: " . $_POST['User_message'] . '<br><hr>';

$connection = mysqli_connect('localhost','root','','VizitkaData' );

if ($connection == false){
    echo "Не удалось подключиться к БД";
    echo mysqli_connect_error();
    exit();
}else{
    echo "Удалось подключиться к БД" . '<br><hr>';
}

$sql = "INSERT INTO `Messages` ( `Date_time`, `Visitor_name`, `Email`, `Message`) VALUES (now(), '" . $_POST['User_name'] . "', '" . $_POST['User_email'] . "', '" . $_POST['User_message'] . "')";

echo $sql  . '<br><hr>';

if($connection->query($sql)){
    echo "Данные успешно добавлены" . '<br><hr>';
} else{
    echo "Ошибка: " . $connection->error;
}
$connection->close();

//текст сообщения
//"%0A" - это переход на новую строку  /   тэг <br> телеграм не переваривает
$mes_text = "Имя: "."<b>".$_POST['User_name']."</b>"."%0A"."Почта: "."<b>".$_POST['User_email']."</b>"."%0A"."Сообщение: "."<b>".$_POST['User_message']."</b>";

//https://api.telegram.org/bot******************************/getUpdates
// после того как бот зарущен и добавлен - найти отрицательный чатайди(отрицательный значит групповой)

$token = "****************************";
$chatid = "**********";

echo "Connect2tg"  . '<br><hr>';
echo $mes_text  . '<br><hr>';
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatid}&parse_mode=html&text={$mes_text}","r");

if ($sendToTelegram)
{
    echo "Connected2tg"  . '<br><hr>';
}else
{
    echo "NOTConnected2tg"  . '<br><hr>';
};

?>