//var xmlHttp = createXmlHttpRequestObject();

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

function showSensorStatus(){
    try{
        xmlHttp = createXmlHttpRequestObject();
    }catch(err){
        alert(err.message);
    }

    if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
        var status = document.getElementById("status_type").value;
        xmlHttp.open("GET", "http://localhost/ozious/php/SensorStatusList.php?status="+status, true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
        setTimeout('showTemperature()', 1000);
    }else{
        alert("Error occurred");
    }
}

function handleServerResponse(){
    if(xmlHttp.readyState == 4){
        if(xmlHttp.status == 200 || xmlHttp.status == 304){
            var message = xmlHttp.responseText;
            document.getElementById("sensor_status_list").innerHTML = message;
        }else{
            alert("Something went wrong");
        }
    }
}

