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
    }else{
        alert("Fucked up");
    }
}

function handleServerResponse(){
    if(xmlHttp.readyState == 4){
        if(xmlHttp.status == 200 || xmlHttp.status == 304){
            var message = xmlHttp.responseText;

            document.getElementById("avgtemperature").innerHTML = '<span>'+ message +'</span>';
            //alert(message);
        }else{
            alert("Something went wrong");
        }

    }
}

