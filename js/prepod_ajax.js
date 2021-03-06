var idPredmet, semestr;

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
    var mainId = $("#listGroup option:selected").val();
    var groupId = $("#listGroup").data("idGroup");
    alert(groupId);
    $.ajax({
        type: "POST",
        async: false,
        url: "../ajax/ajax_mainMarksTable.php",
        data: ({main_id: mainId})
    }).done(function (data) {
        $("#mainPrepodTable").html(data);
    });
});