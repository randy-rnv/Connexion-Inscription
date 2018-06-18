var day     = document.getElementById("day");
var month   = document.getElementById(("month"));
var year    = document.getElementById(("year"));

for(let i=1; i<= 31; i++){
    let option   = document.createElement("option");
    option.value = i<10 ? "0"+i : i;
    option.id    = i<10 ? "0"+i : i;
    option.textContent = i<10 ? "0"+i : i;
    day.appendChild(option);
}

for(let i=1; i<=12; i++){
    let option   = document.createElement("option");
    option.value = i<10 ? "0"+i : i;
    option.textContent = i<10 ? "0"+i : i;
    month.appendChild(option);
}

for(let i=1950; i<= 2010; i++){
    var option   = document.createElement("option");
    option.value = i;
    option.textContent = i<10 ? "0"+i : i;
    year.appendChild(option);
}