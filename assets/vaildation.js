function vaild_pw() {
    let name = document.getElementById('user_account').value;
    let pw = document.getElementById('user_password').value;
    let pw_alert = document.getElementById('pw_alert');
    let role = document.getElementById('role').value;

    let pwdRegex = new RegExp('(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[^a-zA-Z0-9]).{8,30}');
    if (role == "admin") {
        console.log(pw.length)
        if (pw.length < 12) {
            pw_alert.innerHTML = "管理員密碼請輸入至少12位字元";
            return false
        } else {
            pw_alert.innerHTML = "";
        }
    } else { 
        if (pw.length < 8) { 
            pw_alert.innerHTML = "請輸入至少8位字元";
            return false
        }  else {
            pw_alert.innerHTML = "";
        }

    }

    if (!pwdRegex.test(pw) && pw != 0) {
        pw_alert.innerHTML = "密碼需包含大寫英文、小寫英文、數字及特殊符號";
        return false
    } else {
        pw_alert.innerHTML = "";
    }

    if(pw.length > 20) {
        pw_alert.innerHTML = "密碼請輸入20位以內字元";
        return false
    } 

    if (name == pw) { 
        pw_alert.innerHTML = "帳號跟密碼不能相同";
        return false
    }
    vaild_ch_pw()
}


function vaild_ch_pw(){
    let pw = document.getElementById('user_password')
        , pw_ch = document.getElementById('user_ch_password')
    let pw_ch_alert = document.getElementById('pw_ch_alert');
    
    if (pw.value != pw_ch.value) {
        pw_ch_alert.innerHTML = "兩次密碼輸入不一致";
        pw_ch.setCustomValidity("兩次密碼不一致，請重新輸入");
    } else {
        pw_ch_alert.innerHTML = "";
        pw_ch.setCustomValidity('');
    }
}

