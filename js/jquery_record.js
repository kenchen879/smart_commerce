$(function() {
    $("#selectYear").change(function() {
        var transYear = ($("#selectYear").val() === undefined) ? "%" : $("#selectYear").val();
        $("#selectMonth").remove();
        $("#selectDay").remove();
        $.post("../ajax/sentQueryRecord.php", {
                selectOption: $("#selectOption").val(),
                transYear: transYear,
            },
            function(msg) { //表單送出
                if (msg == "noreg") {
                    alert("錯誤!請稍後再試");
                } else {
                    $("#showRecord").html(msg);
                }
            });
        $.post("../ajax/createSelectMonth.php", {
                transYear: $("#selectYear").val(),
                selectOption: $("#selectOption").val()
            },
            function(msg) { //表單送出
                if (msg == "noreg") {
                    alert("錯誤!請稍後再試");
                } else {
                    $("#selectMon").html(msg);
                }
            });

    });
    $("#selectMon").change(function() {
        var transYear = ($("#selectYear").val() === undefined) ? "%" : $("#selectYear").val();
        var transMonth = ($("#selectMonth").val() === undefined) ? "%" : $("#selectMonth").val();
        $("#selectDay").remove();
        $.post("../ajax/sentQueryRecord.php", {
                selectOption: $("#selectOption").val(),
                transYear: transYear,
                transMonth: transMonth
            },
            function(msg) { //表單送出
                if (msg == "noreg") {
                    alert("錯誤!請稍後再試");
                } else {
                    $("#showRecord").html(msg);
                }
            });
        $.post("../ajax/createSelectDate.php", {
                transMonth: $("#selectMonth").val(),
                transYear: $("#selectYear").val(),
                selectOption: $("#selectOption").val()
            },
            function(msg) { //表單送出
                if (msg == "noreg") {
                    alert("錯誤!請稍後再試");
                } else {
                    $("#selectDate").html(msg);
                }
            });

    });
    $("#selectDate").change(function() {
        var transYear = ($("#selectYear").val() === undefined) ? "%" : $("#selectYear").val();
        var transMonth = ($("#selectMonth").val() === undefined) ? "%" : $("#selectMonth").val();
        var transDay = ($("#selectDay").val() === undefined) ? "%" : $("#selectDay").val();
        $.post("../ajax/sentQueryRecord.php", {
                selectOption: $("#selectOption").val(),
                transYear: transYear,
                transMonth: transMonth,
                transDay: transDay
            },
            function(msg) { //表單送出
                if (msg == "noreg") {
                    alert("錯誤!請稍後再試");
                } else {
                    $("#showRecord").html(msg);
                }
            });
    });
    $("#selectOption").change(function() {
        var transYear = ($("#selectYear").val() === undefined) ? "%" : $("#selectYear").val();
        var transMonth = ($("#selectMonth").val() === undefined) ? "%" : $("#selectMonth").val();
        var transDay = ($("#selectDay").val() === undefined) ? "%" : $("#selectDay").val();
        $.post("../ajax/sentQueryRecord.php", {
                selectOption: $("#selectOption").val(),
                transDay: $("#selectDay").val(),
                transMonth: $("#selectMonth").val(),
                transYear: $("#selectYear").val()
            },
            function(msg) { //表單送出
                if (msg == "noreg") {
                    alert("錯誤!請稍後再試");
                } else {
                    $("#showRecord").html(msg);
                }
            });
    });
    $("#resetRecord").click(function() {
        $.post("../ajax/profile/dashboard.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
})