var login           = document.getElementById("login");
var login2          = document.getElementById("login2");
var clientMessage   = document.getElementById("clientMessage");

var day             = document.getElementById("day");
var month           = document.getElementById("month");
var monthWith31day  = ["01", "03", "05", "07", "08", "10", "12"];

// check if login exist
login.addEventListener("blur", function(){
    ajaxGet(
        "controller/controlAjax/loginCheck.php?login=" + login.value,
        function(response){
            let error = document.getElementById("loginCheckMessage");

            if(response !== "1" && error === null){
                // if login exist, show message
                let message         = document.createElement("span");
                message.id          = "loginCheckMessage";
                message.innerHTML   = "Email/Numéro existant. <br/>";
                clientMessage.appendChild(message);
            }else if(response === "1" && error !== null){
                // if login available, hide message
                clientMessage.removeChild(error);
            }
        }
    );
});

// login == login2
login2.addEventListener("blur", function(){
    let error = document.getElementById("loginSameMessage");

    //if login != login2 show error message
    if(login.value !== login2.value && error === null){
        let message         = document.createElement("span");
        message.id          = "loginSameMessage";
        message.innerHTML   = "email/numero ne correspondent pas. <br/>";
        clientMessage.appendChild(message);
    }else if(login.value === login2.value && error !== null){
        // if login == login2, hide error message
        clientMessage.removeChild(error);
    }
});

// 30 or 31 days in a month
month.addEventListener("change", function(e){
    var monthSelected = month.value;
    var day30         = document.getElementById("30");
    var day31         = document.getElementById("31");

    if(monthSelected === "02"){
        day.removeChild(day30);
        day.removeChild(day31);
    }else if(monthWith31day.indexOf(monthSelected) === -1){
        // if there is only 30 days in selected month
        day.removeChild(day31);
    }else{
        // if there is 31 days in selected month
        if(day30 === null){
            let option = document.createElement("option");
            option.value = 30;
            option.id    = 30;
            option.textContent = 30;
            day.appendChild(option);
        }
        if(day31 === null){
            let option = document.createElement("option");
            option.value = 31;
            option.id    = 31;
            option.textContent = 31;
            day.appendChild(option);
        }
    }
});













