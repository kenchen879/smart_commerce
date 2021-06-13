$(function() {
    $().ready(() => {
        $.get("../ajax/profile/dashboard.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#dashboard").click(function() {
        $.get("../ajax/profile/dashboard.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#order").click(function() {
        $.get("../ajax/profile/order.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#address").click(function() {
        $.get("../ajax/profile/address.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#profile").click(function() {
        $.get("../ajax/profile/profile-details.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#like").click(function() {
        $.get("../ajax/profile/favoriteItem.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    $("#changepassword").click(function() {
        $.get("../ajax/profile/changePassword.php", function(msg) { //表單送出
            $("#present").html(msg);
        });
    });
    // $("#changephone").click(function() {
    //     $.get("../ajax/profile/changePhone.php", function(msg) { //表單送出
    //         $("#present").html(msg);
    //     });
    // });
})