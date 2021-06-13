$(()=>{
    var totalI = $("#countI").val();
    const changePara = (para, changePara)=>{
        $(para).click((e)=>{
            $(para).attr('style','display:none');        
            $(changePara).attr('style','display:inline;width:50%;height:100%');
            let paraV = $(para).val();            
            $(changePara).val(paraV);
            e.stopPropagation();
        });
    }
    const sendChange = (changePara, changeVal, pNo) => {            
        switch(changePara){
            case "#changeName" + pNo :                
                $.post("../restaurant/ajax/changeProfile.php", { pName: changeVal, pNo: pNo}, function(msg) { //表單送出
                    if (msg == "noreg") {
                        alert("錯誤!請稍後再試");
                    }
                });
                $("#ppName" + pNo).text(changeVal);
                break;
            case "#changePrice" + pNo:                
                $.post("../restaurant/ajax/changeProfile.php", { pUnitPrice: changeVal, pNo: pNo }, function(msg) { //表單送出                    
                    if (msg == "noreg") {
                        alert("錯誤!請稍後再試");
                    }
                });                
                $("#ppUnitPrice" + pNo).text('$ ' + changeVal);
                break;
            case "#changeDes" + pNo:
                $.post("../restaurant/ajax/changeProfile.php", { pDescription: changeVal, pNo: pNo }, function(msg) { //表單送出                    
                    if (msg == "noreg") {
                        alert("錯誤!請稍後再試");
                    }
                });
                break;
            case "#changeCate" + pNo:
                $.post("../restaurant/ajax/changeProfile.php", { category: changeVal, pNo: pNo }, function(msg) { //表單送出
                    if (msg == "noreg") {
                        alert("錯誤!請稍後再試");
                    }
                });
                break;
        }
        
    }
    const clickSpace = (para, changePara, pNo) => {
        $('body').click((e)=>{
            if(!$(changePara).is(e.target) && $(changePara).has(e.target).length == 0) {
                let changeVal = $(changePara).val();
                if(changeVal !== ""){
                    let paraV = changeVal;
                    paraV = paraV.replace(/(^[\s]*)|([\s]*$)/g, "");
                    paraV = paraV.replace(/\n/g, "<br>");
                    sendChange(changePara, paraV, pNo);
                    $(changePara).val(null);
                    changeVal = changeVal.replace(" ", "\n");
                    $(para).text(changeVal);                    
                }                
                $(changePara).attr('style','display:none');
                $(para).attr('style','display:inline');                
            }
        });        
    }
    for (let i = 1; i <= totalI; i++) {
        $("#productmodal" + i).click(()=>{
            changePara('#pName' + i, '#changeName' + i);
            changePara('#pUnitPrice' + i, '#changePrice' + i);
            changePara('#pDescription' + i, '#changeDes' + i);
            changePara('#category' + i, '#changeCate' + i);
            clickSpace('#pName' + i, '#changeName' + i, i);
            clickSpace('#pUnitPrice' + i, '#changePrice' + i, i);
            clickSpace('#pDescription' + i, '#changeDes' + i, i);
            clickSpace('#category' + i, '#changeCate' + i, i);        
        });        
    }    
});