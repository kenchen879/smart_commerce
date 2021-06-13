$(function() {
    $("#checkout").click(function() {
        var username = $("#username").val();
        var usercounty = $("#usercounty").val();
        var userdistrict = $("#userdistrict").val();
        var useraddress = $("#useraddress").val();
        var sId1 = $("#sId1").val();
        var sId2 = $("#sId2").val();
        $.post("../ajax/checkout.php", 
        {   username: username, 
            usercounty: usercounty, 
            userdistrict: userdistrict, 
            useraddress: useraddress,
            sId1 : sId1,
            sId2 : sId2
        }, function(msg) { //表單送出
            if (msg == "noreg") {                
                $("#msg").html("錯誤!請稍後再試");
            } else {
                window.location.href = "confirmation.php";
                return;
            }
        });
    });
})