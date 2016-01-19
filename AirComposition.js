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
        loc = encodeURIComponent(document.getElementById("location").value);
        date = encodeURIComponent(document.getElementById("date").value);
        xmlHttp.open("GET", "AirComposition.php?loc="+loc+"&date="+date, true);
        xmlHttp.onreadystatechange = handleServerResponse;
        xmlHttp.send(null);
    }else{
    }
}

function handleServerResponse(){
    if(xmlHttp.readyState == 4){
        if(xmlHttp.status == 200){
            xmlResponse = xmlHttp.responseXML;
            xmlDocumentElement = xmlResponse.documentElement;
            var message = xmlDocumentElement.firstChild.data;
            var result = message.split(":");

            document.getElementById("oxygenPercentage").innerHTML = '<span>'+result[0]+'%</span>';
            document.getElementById("nitrogenPercentage").innerHTML = '<span>'+result[1]+'%</span>';
        }else{
            alert("Something went wong");
        }
    }
}
