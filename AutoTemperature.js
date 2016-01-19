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

function process(){
    try{
        xmlHttp = createXmlHttpRequestObject();
    }catch(err){
        alert(err.message);
    }

    if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
        var value = getRandom(28, 35);
        value = value.toFixed(2);
        xmlHttp.open("GET", "AutoTemperature.php?randvalue="+value, true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
        setTimeout('process()', 2000);
    }else{
        setTimeout('process()', 2000);
    }
}

function handleServerResponse(){
    if(xmlHttp.readyState == 4){
        if(xmlHttp.status == 200){
            xmlResponse = xmlHttp.responseXML;
            xmlDocumentElement = xmlResponse.documentElement;
            var message = xmlDocumentElement.firstChild.data;
            document.getElementById("randomValue").innerHTML = '<span>'+message+'%</span>';
        }else{
            alert("Something went wrong");
        }

    }
}

function getRandom(min, max){
    return Math.random() * (max - min) + min;
}