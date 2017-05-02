<?php
session_start();
require_once "../controller/PrepodPredmet.php";
require_once "../controller/PrepodSemestr.php";
//require "../controller/PrepodGroup.php";
//require "../controller/PrepodTable.php";

$pred = new PrepodPredmet();

if (!isset($_SESSION['auth']) && !$_SESSION['auth'] == 'prepod') {
    header("Location: /");
}
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
    <link rel="stylesheet" type="text/css" href="../css/shadows.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body style="background-image: url('../images/background.jpg');">

<!--MENU NAVBAR-->
<div class="container">
    <div class="row">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand">Вы вошли как преподаватель</span>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Главная</a></li>
                        <!--li><a href="add.php">Добавить</a></li-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false"><?php echo ' ' . $_SESSION['surname'] . ' ' . $_SESSION['name'] . ' ' . $_SESSION['patronic']; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="settings.php">Настройки</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="?exit">Выход <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!--//MENU NAVBAR-->

<div class="container shadow-left-right-bottom" style="height:800px; margin-top:-20px; padding-top: 20px; background-color: #fff;">

    <!--Вывод всех предметов-->
    <div class="col-sm-4 col-md-4">
        <div class="form-group">
            <label class="control-label">Предмет:</label>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">
                Добавить новый
            </button>

            <!-- Modal Predmet -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Добавить предмет</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="forSelectPredmet">Выбрать из существующих предметов</label>
                                <select multiple class="form-control" id="forSelectPredmet">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="forInputPredmet">Добавить новый предмет</label>
                                <input type="text" id="forInputPredmet" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Добавить</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="form-group">
            <select multiple class="form-control" id="listPredmet">
                <?php
                $pred->outputAllPredmetPrepod();
                ?>
            </select>
        </div>
    </div>

    <!--Блок семестра-->
    <div class="col-sm-4 col-md-4">
        <div id="select_semestr">
            <div class="form-group">
                <label class="control-label">Семестр:</label>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalSemestr">
                    Добавить новый
                </button>

                <!-- Modal Semestr-->
                <div class="modal fade" id="myModalSemestr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Добавить семестр</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="forSelectPredmet">Выберите предмет</label>
                                    <select multiple class="form-control" id="forSelectPredmet" required>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="row"><hr/></div>
                                <div class="form-group">
                                    <label for="forInputPredmet">Добавить новый семестр</label>
                                    <input type="text" id="forInputPredmet" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group" id="divListSemestr">
                <select multiple class="form-control" id="listSemestr">
                    <option>Нет данных</option>
                </select>
            </div>
        </div>
    </div>

    <!--Блок выбора группы-->
    <div class="col-sm-4 col-md-4">
        <div id="select_group">
            <div class="form-group">
                <label class="control-label">Группа:</label>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalGroup">
                    Добавить новый
                </button>

                <!-- Modal Semestr-->
                <div class="modal fade" id="myModalGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Добавить группу</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="forSelectPredmet">Выберите предмет</label>
                                    <select multiple class="form-control" id="forSelectPredmet">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="forSelectPredmet">Выберите семестр</label>
                                    <select multiple class="form-control" id="forSelectPredmet">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>

                                <div class="row"><hr/></div>

                                <div class="form-group">
                                    <label for="forSelectPredmet">Выбрать из существующих групп</label>
                                    <select multiple class="form-control" id="forSelectPredmet">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="forInputPredmet">Добавить новую группу</label>
                                    <input type="text" id="forInputPredmet" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Добавить</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <select multiple class="form-control" id="listGroup">
                    <option>Нет данных</option>
                </select>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-12">
        <div class="table-responsive" id="mainPrepodTable">

        </div>
    </div>
</div>

<div class="container" style="margin-bottom: 40px">

</div>

<!--script src="../js/prepod_ajax.js"></script-->
<script type="text/javascript">
    var idPredmet, semestr, group;

    $("#listPredmet").change(function () {
        idPredmet = $("#listPredmet option:selected").val();
        $.ajax({
            type: "POST",
            async: false,
            url: "../ajax/ajax_semestr.php",
            data: ({id_predmet: idPredmet})
        }).done(function (data) {
            $("#listSemestr").html(data);
        });
    });

    $("#listSemestr").change(function () {
        semestr = $("#listSemestr option:selected").val();
        $.ajax({
            type: "POST",
            async: false,
            url: "../ajax/ajax_group.php",
            data: ({id_predmet: idPredmet, semestr: semestr})
        }).done(function (data) {
            $("#listGroup").html(data);
        });
    });

    $("#listGroup").change(function () {
        group = $("#listGroup option:selected").val();
        $.ajax({
            type: "POST",
            async: false,
            url: "../ajax/ajax_mainTable.php",
            data: ({id_predmet: idPredmet, semestr: semestr, id_group: group})
        }).done(function (data) {
            $("#mainPrepodTable").html(data);
        });
    });
</script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>