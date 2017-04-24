<?php
session_start();

if (isset($_GET['exit'])) {
    session_unset();
    session_destroy();
    header("Location: /");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

<!--MENU NAVBAR-->
<div class="container">
    <div class="row">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand">Вы вошли как гость</span>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Оценки</a></li>
                        <li><a href="predmet.php">Предметы</a></li>
                        <li class="active"><a href="results.php">Итоги</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <p class="navbar-text"><?php echo ' ' . $_SESSION['surname'] . ' ' . $_SESSION['name'] . ' ' . $_SESSION['patronic']; ?></p>
                        <?php if ($_SESSION['auth'] == 'student') { echo '<li><a href="?exit">Выход</a></li>'; }  ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!--//MENU NAVBAR-->

<div class="container">

    <div class="container">

        <!--div class="col-sm-6 col-md-6"-->
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>Мат методы</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>Техн. защит. информации</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>БД</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>Теория вероятности</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>ИЗВП</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>ОПИ</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>ПП</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>МОП</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>Комп. схемотехника</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>ЧМИ</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>Администрирование</td>
                    <td>5</td>
                </tr>
            </table>
        </div>
    </div>
</div>

</div>

<script src="../js/bootstrap.min.js"></script>
</body>
</html>