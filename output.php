<script>

	var filename = (dirname(__FILE__).'/uploads/MKyokyok.xml');
function init(){
    // load xml file
    if (window.XMLHttpRequest) {
       xhttp = new XMLHttpRequest();
    } else {    // IE 5/6
       xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.open("GET", filename, false);
    xhttp.send();
    xmlDoc = xhttp.responseXML; 

    var uurloon = xmlDoc.getElementsByTagName("Kategori")[0].childNodes[0].textContent;
    var setloon = xmlDoc.getElementsByTagName("KategoriTree")[0].childNodes[0].textContent;
    var color = xmlDoc.find("Ozellik[Tanim='Color']").text();
    console.log(uurloon,setloon); //give me "10 100"
}
</script>