let myJSON;
let requestType = "GET";
let operator;

$(document).ready(function(){
    $("submitBtn").click(function(){
        $.get("demo_test_post.asp",
            {
                name: "Donald Duck",
                city: "Duckburg"
            },
            function(data,status){
                alert("Data: " + data + "\nStatus: " + status);
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
