var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
    var xmlHttp;

    if(window.ActiveXObject){
        //Internet Explorer
        try{
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlHttp = false;
        }
    }else{
        //Other browsers
        try{
            xmlHttp = new XMLHttpRequest();
        }catch(e){
            xmlHttp = false;
        }
    }
    if(!xmlHttp){
        alert("Can not create xmlHttp object!")
    }else{
        return xmlHttp;
    }
}

function showTemperature(){
    try{
        xmlHttp = createXmlHttpRequestObject();
    }catch(err){
        alert(err.message);
    }

    if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
        var loc = document.getElementById("location").value;
        var date = document.getElementById("date").value;
        xmlHttp.open("GET", "http://localhost/ozious/php/TemperatureReadings.php?loc="+loc+"&date=2016-01-14", true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
        setTimeout('showTemperature()', 1000);
    }else{
        alert("Fucked up");
    }
}

function handleServerResponse(){
    if(xmlHttp.readyState == 4){
        if(xmlHttp.status == 200 || xmlHttp.status == 304){
            var message = xmlHttp.responseText;
            var data = message.split(":");
            var res = [];
            var tot = 0;
            for (var i = 0; i < data.length-1; ++i) {
                res.push([i, data[i]]);
                tot += parseFloat(data[i]);
            }
            tot = tot/(data.length-1);
            tot = tot.toFixed(2);
            $.plot($("#flot-line-chart-moving"), [ res ]);
            document.getElementById("avgtemperature").innerHTML = '<span>'+ tot +'</span>';
            //alert(message);
        }else{
            alert("Something went wrong");
        }

    }
}

