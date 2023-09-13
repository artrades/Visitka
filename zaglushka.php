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
    echo "Данные успешно добавлены";
} else{
    echo "Ошибка: " . $connection->error;
}
$connection->close();

?>