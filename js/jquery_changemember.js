$(()=>{
    const changePara = (para, changePara)=>{
        $(para).click((e)=>{
            $(para).attr('style','display:none');        
            $(changePara).attr('style','display:inline;width:20%;height:100%');
            e.stopPropagation();
        });
    }
    const sendChange = (changePara, changeVal) => {        
        switch(changePara){
            case "#changeName" :                
                $.post("../ajax/changeProfile.php", { mName: changeVal }, function(msg) { //表單送出
                    if (msg == "noreg") {
                        alert("錯誤!請稍後再試");
                    }
                });
                break;
            case "#changeMail" :
                $.post("../ajax/changeProfile.php", { mEmail: changeVal }, function(msg) { //表單送出
                    if (msg == "noreg") {
                        alert("錯誤!請稍後再試");
                    }
                });
                break;
            case "#changePhone" :
                $.post("../ajax/changeProfile.php", { mPhone: changeVal }, function(msg) { //表單送出
                    if (msg == "noreg") {
                        alert("錯誤!請稍後再試");
                    }
                });
                break;
        }
        
    }
    const clickSpace = (para, changePara) => {
        $('body').click((e)=>{
            if(!$(changePara).is(e.target) && $(changePara).has(e.target).length == 0) {
                let changeVal = $(changePara).val();
                if(changeVal !== ""){                                        
                    sendChange(changePara, changeVal); 
                    $(changePara).val(null);
                    $(para).text(changeVal);
                }                
                $(changePara).attr('style','display:none');
                $(para).attr('style','display:inline');                
            }
        });        
    }
    
    changePara('#mName', '#changeName');  
    changePara('#mEmail', '#changeMail'); 
    changePara('#mPhone', '#changePhone');     
    clickSpace('#mName', '#changeName'); 
    clickSpace('#mEmail', '#changeMail'); 
    clickSpace('#mPhone', '#changePhone');     
        
});