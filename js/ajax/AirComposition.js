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

function getAirComposition(){
    try{
        xmlHttp = createXmlHttpRequestObject();
    }catch(err){
        alert(err.message);
    }

    if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
        loc = encodeURIComponent(document.getElementById("location").value);
        date = encodeURIComponent(document.getElementById("date").value);
        xmlHttp.open("GET", "http://localhost/ozious/php/AirComposition.php?loc="+loc+"&date="+date, true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
    }else{
    }
}

function handleServerResponse(){
    if(xmlHttp.readyState == 4){
        if(xmlHttp.status == 200 || xmlHttp.status == 304){
            var message = xmlHttp.responseText;
            var result = message.split(":");
            document.getElementById("oxygenPercentage").innerHTML = '<span>'+result[0]+'%</span>';
            document.getElementById("nitrogenPercentage").innerHTML = '<span>'+result[1]+'%</span>';
        }else{
            alert("Something went wong");
        }
    }
}
