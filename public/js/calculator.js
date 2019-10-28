let myJSON;
let requestType = "GET";
let operator;

$(document).ready(function(){
    $("#submitBtn").click(function(){
        console.log($('#operator').val());
        $.post("http://127.0.0.1:8000/calculator/ajax",
            {
                firstNumber: $('#firstNumber').val(),
                secondNumber: $('#secondNumber').val(),
                operator: $('#operator').val(),
                _token: $('input[name ="_token"]').val(),
            },
            function(data,status){
                $('#resultLabel').text("Answer : " + JSON.parse(data).result);
                // alert("Data: " + data + "\nStatus: " + status);
            });
    });
});

function updateText(xhttp) {
    $("#para").text(xhttp.responseText);
    myJSON = xhttp.responseText;
}

function loadData(url) {
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if(this.readyState==4 && this.status == 200){
            updateText(this);
        }
    };
    console.log( requestType+" "+url);
    xhttp.open(requestType, url, true);
    xhttp.send();
}
init();
