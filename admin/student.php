<?php
session_start();
require_once "../controller/AdminStudent.php";

if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 'admin') {
    header("Location: /");
}

$castud = new AdminStudent();

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
                    <span class="navbar-brand">Вы вошли как администратор</span>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Предметы</a></li>
                        <li><a href="group.php">Группы</a></li>
                        <li class="active"><a href="student.php">Студенты</a></li>
                        <li><a href="prep.php">Преподователи</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false"><?php echo $_SESSION['name']; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <!--li><a href="settings.php">Настройки</a></li>
                                <li role="separator" class="divider"></li-->
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

    <div style="margin-top: 30px;">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td width="20%"><b>Фамилия</b></td>
                    <td width="20%"><b>Имя</b></td>
                    <td width="20%"><b>Отчество</b></td>
                    <td width="20%"><b>Группа</b></td>
                    <td align="center" width="5%"><span class="glyphicon glyphicon-trash"></span></td>
                </tr>
                </thead>
                <tbody id="dataTableStudent">

                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="container" style="margin-bottom: 40px">

</div>

<script type="text/javascript">
    function fetch_data() {
        $.ajax({
            type: "POST",
            async: false,
            url: "../ajax/ajax_admin_student_output.php"
        }).done(function (data) {
            $("#dataTableStudent").html(data);
        });
    }

    function edit_data(id, text, column_name) {
        $.ajax({
            type: "POST",
            async: false,
            url: "../ajax/ajax_admin_student_edit.php",
            data: ({id:id, text:text, column_name:column_name}),
            dataType: "text"
        }).done(function (data) {
            alert(data);
        });
    }

    function delete_data(id) {
        $.ajax({
            type: "POST",
            async: false,
            url:"../ajax/ajax_admin_student_del.php",
            data: ({id:id}),
            dataType: "text"
        }).done(function (data) {
            alert(data);
            fetch_data();
        });
    }

    fetch_data();

    $(document).on('blur', '.surnameStudent', function(){
        var id = $(this).data("idSurname");
        var changeSurname = $(this).text();
        edit_data(id, changeSurname, "surname");
        fetch_data();
    });
    $(document).on('blur', '.nameStudent', function(){
        var id = $(this).data("idName");
        var changeName = $(this).text();
        edit_data(id, changeName, "name");
        fetch_data();
    });
    $(document).on('blur', '.patronicStudent', function(){
        var id = $(this).data("idPatronic");
        var changePatronic = $(this).text();
        edit_data(id, changePatronic, "patronic");
        fetch_data();
    });

    $(document).on('blur', '.groupStudent', function(){
        var id = $(this).data("idGroup");
        var changeGroup = $(this).text();
        //edit_data(id, changeGroup, "group");
        fetch_data();
    });

    $(document).on('click', '.deleteStudent', function(){
        var id = $(this).data("idDel");
        if(confirm("Вы уверены, что хотите удалить это?")) {
            delete_data(id);
        }
    });

</script>

<script src="../js/bootstrap.min.js"></script>
</body>
</html>