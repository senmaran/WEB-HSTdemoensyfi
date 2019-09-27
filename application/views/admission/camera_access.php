<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Select Picture</title>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

<script src="<?php echo base_url(); ?>assets/js/webcam.js" type="text/javascript"></script>
<script language="JavaScript">
function take_snapshot() {
    Webcam.snap(function(data_uri) {
    document.getElementById('results').innerHTML = '<img id="base64image" src="'+data_uri+'"/><button onclick="SaveSnap();" class="btn btn-info btn-fill center">Save Snap</button>';
});
}
function ShowCam(){
Webcam.set({
width: 350,
height: 300,
image_format: 'jpeg',
jpeg_quality: 100
});
Webcam.attach('#my_camera');
}
function SaveSnap(){
    document.getElementById("loading").innerHTML="Saving, please wait...";
    var file =  document.getElementById("base64image").src;
    var formdata = new FormData();
    formdata.append("base64image", file);
    var ajax = new XMLHttpRequest();
    ajax.addEventListener("load", function(event) { uploadcomplete(event);}, false);
    ajax.open("POST", "<?php echo base_url(); ?>admission/camera_pic_upload");
    ajax.send(formdata);
}
function uploadcomplete(event){
    document.getElementById("loading").innerHTML="";
    var image_return=event.target.responseText;
	var disp_image = "<?php echo base_url(); ?>"+image_return;
	//alert (disp_image);
    //var showup = document.getElementById("uploaded").src=disp_image;
	alert ("Image Captured in your local machine")
	window.close();
}
window.onload= ShowCam;
</script>
<style type="text/css">
.container{display:inline-block;width:400px;margin:10px;}
#Cam{background:rgb(215,214,215);}#Prev{background:rgb(198,199,198);}#Saved{background:rgb();}
</style>
</head>
<body>
<div class="container" id="Cam"><b>Webcam Preview...</b>
    <div id="my_camera"></div><form><input type="button" value="Snap It" class="btn btn-info btn-fill center" onClick="take_snapshot()"></form>
</div>
<div class="container" id="Prev" style="margin:10px;">
    <b>Snap Preview...</b><div id="results"></div>
</div>
<div class="container" id="Saved">
    <b>Saved</b><span id="loading"></span><img id="uploaded" src=""/>
</div>
</body>
</html>