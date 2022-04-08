<?php
$db_host = 'localhost';
$db_name = 'myforum';
$username = 'root';
$password = '';

$connect = new PDO("mysql:host=$db_host;dbname=$db_name", $username, $password);

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    $date = date('Y-m-d H:i:s');
    $query = $connect ->query("INSERT INTO myforum.coments (username, comment, date) VALUES ('$username', '$comment', '$date')");
}
session_start();



if(isset($_POST["captcha_code"])){

    if($_POST["captcha_code"] === $_SESSION["captcha_code"]){
        $message ='<p class="text-success" id="msg">Message Submitted Successfully</p>';
    }
}

?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>TEST</title>
</head>

<style>
    figure {
        width: 35%; /* Ширина */
        float: left; /* Выстраиваем элементы по горизонтали */
        margin: 0 0 0 3.5%; /* Отступ слева */
        background: white; /* Цвет фона */
        border-radius: 5px; /* Радиус скругления */
        padding: 1%; /* Поля */
    }
    figure:first-child {
        margin-left: 0; /* Убираем отступ для первого элемента */
    }
    form{
        display: flex;
        flex-direction: column;
    }
</style>

<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Тестовое задание для web-программиста(стажер)</h5>
    <nav class="my-2 my-md-0 mr-md-3">

    </nav>
    <a class="btn btn-outline-primary" href="index.php">HOME</a>
</div>

<div class="container">
<div class="card mb-4 box-shadow">
    <div class="card-header">
        <h4 class="my-0 font-weight-normal">Немного юмора</h4>
    </div>
    <div class="card-body">
        <figure> <img src="img/photo_1.jpg" class="img-thumbnail"> </figure>
        <div class="container">
        <h2 class="card-title pricing-card-title">Meme</h2>
        <ul class="list-unstyled mt-3 mb-4"> </ul>
            <hr>
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Ваше имя">
                <textarea name="comment" cols="30" rows="5" placeholder="Ваш комментарий"></textarea>
                <input type="submit">
            </form>
        <hr>
            <br>
        <h2>Комментарии</h2>
        <?
        $coments = $connect->query(" SELECT * FROM myforum.coments ORDER BY date DESC ");
        $coments = $coments-> fetchAll(PDO::FETCH_ASSOC) ;
        foreach ($coments as $coment) {
        ?>
        <p><?="{$coment['date']} {$coment['username']} оставил(а) комментарий: {$coment['comment']}"?>
            <button> удалить </button>
        </p>
            <? } ?>

     </div>
    </div>
    </div>
</div>
</div>

 <footer class="text-muted">
       <div class="container">
         <p>Выполнил Леонтьев Алексей</p>
       </div>
 </footer>
</body>
</html>