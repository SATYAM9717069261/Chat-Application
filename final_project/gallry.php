
 <!DOCTYPE html>
<html>

<head>
    <title>Gallry</title>
    <style>
    .main {
    border: 2px black solid;
    border-radius: 10px;
      }

.cross {
    background-color: #286090;
}

.white-background {
    display: none;
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0px;
    left: 0px;
    background-color: #fefefe;
    opacity: 0.7;
    z-index: 9999;
}

.images {
    height: 60%;
    width: auto;
    background-color: red;
}

.image_optamize {
    height: 140px;
    width: 250px;
    margin: 5px;
    color: black;
    text-align: center;
    cursor: -moz-zoom-in;
    cursor: -webkit-zoom-in;
    cursor: zoom-in;
}

.upload_img {
    height: 140px;
    width: 250px;
    margin: 8px;
    border: 5px white solid;
    border-radius: 5px;
    color: black;
    font-size: 40px;
}

#zoom_image {
    width: 100%;
    height: 100%;
    position: fixed;
    display: none;
    top: 0px;
    left: 0px;
    background-color: white;
    opacity: 0.7;
}

#inner {
    width: 1000px;
    height: 250px;
    position: fixed;
    display: none;
    top: 31px;
    right: 180px;
    border-radius: 10px;
    background-color: #7c7d7e;
}

#vedio_inner {
    width: 1000px;
    height: 250px;
    position: fixed;
    display: none;
    top: 31px;
    right: 180px;
    border-radius: 10px;
    background-color: #7c7d7e;
}

#vedio_div {
    display: none;
    align-items: center;
}

#add_vedio {
    height: 140px;
    width: 250px;
    margin: 8px;
    border: 5px white solid;
    border-radius: 5px;
    color: black;
    font-size: 40px;
}

.vedio_optamize {
    height: 140px;
    width: 250px;
    margin: 5px;
    color: black;
    text-align: center;
    cursor: pointer;
}

vedio {
    position: relative;
    margin: 5px;
    display: block;
}
    </style>
</head>

<body>

    <div class="white-background" id="gallry_outer"></div>

    <div id="gallry" style="display:none; z-index: 9999; border-radius: 10px; position:fixed; background-color:#428bca;">
        <div class="container main">
            <!--Upper Close Window Section -->
            <div class="row cross">
                <div class="col-xs-11">
                    <div class="row">
                        <div class="col-xs-1">
                            <label class=" btn" style="font-size:20px; margin-left:1px; padding:0px;" role="button" onclick="show_images()">Images</label>
                        </div>
                        <div class="col-xs-1">
                            <label class=" btn" style="font-size:20px;  margin-left:1px; padding:0px;" role="button" onclick="show_vedious()">Vedios</label>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1 btn btn-info" onclick="hide_galry()">X</div>
            </div>

            <!--images here -->
            <div class="col-xs-18" style="text-align: center;">

                <!--images-->
                <div style="height:470px; width: 100%; overflow-y: scroll;" id="img_div">
                 <div>
                     <button type="button" title="Select Image" class="btn btn-primary btn-lg active" onclick="select_image()">Select image</button>
                     <button type="button" title="Upload Image" class="btn btn-primary btn-lg active" onclick="upload_image()">Upload</button>
                 </div>  
                     <?php include("gallry_images_show.php") ?> 
                 </div>
                <!--end images-->

                <!--vedios-->
                <div style="height:470px; width: 100%; overflow-y: scroll;" id="vedio_div">
                    
                        <div>
                     <button type="button" title="Select Image" class="btn btn-primary btn-lg active" onclick="select_vedio()">Select Vedio</button>
                     <button type="button" title="Upload Image" class="btn btn-primary btn-lg active" onclick="upload_vedio()">Upload</button>
                 </div><div >
               <?php include("gallry_vedio_show.php") ?>
                 </div>
                          
                  </div>
                <!--end Vedios-->

            </div>
        </div>

        <!--hiden input type file donot touch this -->

 <form id="upload_form" enctype="multipart/form-data" method="POST">
        <input style="display:none;" type="file" id="file_upload" name="file1" accept=".png,.jpg"  />       
        <input style="display:none;" type="button" value="upload file" id="file_add" onclick="uploadfile()">
   </form>


<div class="progress">
  <div class="progress-bar" id="progressBar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
       <lable id="status">"%"</lable>
        <lable id="loaded_n_total"></lable>
  </div>
</div>
 <form id="upload_vedio" enctype="multipart/form-data" method="POST">
        <input style="display:none;" type="file" id="vedio_upload" name="file1" accept=".mp4,.mkv"  />       
        <input style="display:none;" type="button" value="upload file" id="vedio_add" onclick="uploadvedio()">
</form>

        <!--hiden input end-->

        <!-- zoom image -->
        <div id="zoom_image"></div>
        <div id="inner">
            <div class="col-md-12 " role="group" aria-label="...">
                <button type="button" class="btn btn-primary col-md-1" style="float: right;" onclick="img_small()">X </button></div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top: 35px;">
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img id="zoom_out" alt="Second slide [1140x500]"  data-holder-rendered="true">
                    </div>
                </div>
            </div>
        </div>
        <!--zoom end-->
    </div>

    <input  style="display:none;" type='text' id='link' />
     <button style="display:none;" id='button_pic' name='profile_pic' onclick='set_pic()'></button>

<input  style="display:none;" type='text' id='delete_link' />
<button style="display:none;" id='delete_pic' name='profile_pic' onclick='del_pic()'></button>

    <script>

setTimeout(gallry_images, 5000);
    
function gallry_images(){
    //gallry_images_shows
    if(window.XMLhttpRequest){
         xmlhttp=new XMLRequest();
    }else{
  
        xmlhttp=new ActiveXObject('Microsoft.XMLHttp');
        }
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readState==4 && xmlhttp.status==200){
                document.getElementById('gallry_images_shows').innerHTML=xmlhttp.responseText;
            }
            xmlhttp.open('GET','gallry_images_show.php',true);
            xmlhttp.send();
        }
}


setTimeout(gallry_vedio, 5000);

function gallry_vedio(){
       if(window.XMLhttpRequest){
         xmlhttp=new XMLRequest();
    }else{
  
        xmlhttp=new ActiveXObject('Microsoft.XMLHttp');
        }
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readState==4 && xmlhttp.status==200){
                document.getElementById('gallry_vedio_shows').innerHTML=xmlhttp.responseText;
            }
            xmlhttp.open('GET','gallry_vedio_show.php',true);
            xmlhttp.send();
        }
}

function delete_pic(e){
 document.getElementById('delete_link').value=e.id;
 document.getElementById('delete_pic').click(); 
}


function del_pic() {
setTimeout(function(){window.location.reload(1);}, 5000);
var d=document.getElementById('delete_link').value;
var image_link="image_link="+d;
var ajax = new XMLHttpRequest();
ajax.open('POST', "delete_image.php",true);
ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
ajax.send(image_link);   
}

function set_profile(e){
 document.getElementById('link').value=e.id;
 document.getElementById('button_pic').click(); 
}
function set_pic(){
var d=document.getElementById('link').value;
var image_link="image_link="+d;
var ajax = new XMLHttpRequest();
ajax.open('POST', "set_profile.php",true);
ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
ajax.send(image_link);
alert('You Need To Refresh This Page for Updates');
}



show_gallry();

function _(el) {
        return document.getElementById(el);
    }
  
    function uploadvedio() {      
        setTimeout(function(){window.location.reload(1);}, 10000);
        var file = _("vedio_upload").files[0];
        var formdata = new FormData();
        if (file.size <= 237492986){
        formdata.append("vedio_upload", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open('POST', "vedio_uploading_status.php");
        ajax.send(formdata);}
        else{
            alert("FILE IS TOO LONG TRY Again");
        }
    }
    
    function uploadfile() {   
        var file = _("file_upload").files[0];
        var formdata = new FormData();
         if (file.size <= 237492986){         
           // alert(file.type);
        formdata.append("file_upload", file);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", progressHandler, false);
        ajax.addEventListener("load", completeHandler, false);
        ajax.addEventListener("error", errorHandler, false);
        ajax.addEventListener("abort", abortHandler, false);
        ajax.open('POST', "file_upload_status.php");
        ajax.send(formdata);
        setTimeout(function(){window.location.reload(1);}, 500);
         }  else{
            alert("FILE IS TOO LONG TRY Again");        
        }
    }

    function progressHandler(event) {
        _("loaded_n_total").innerHTML = "Uploaded" + event.load + "byte of" + event.total;
        var persent = (event.loaded / event.total) * 100;
        _("progressBar").value = Math.round(persent);
        _("status").innerHTML = Math.round(persent) + "% uploaded..... Wait";
        _("progressBar").style.width=Math.round(persent)+"%";
    }

    function completeHandler(event) {
        _("status").innerHTML = event.target.responseText;
        _("progressBar").value = 0;
    }


    function errorHandler(event) {
        _("status").innerHTML = "Upload Failed";
    }

    function abortHandler(event) {
        _("status").innerHTML = "Uploaded Aborted";      
    }


    function dlglogin() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox");
    whitebg.style.display = "none";
    dlg.style.display = "none";
   }

function upload_image(){
        document.getElementById('file_add').click();
}

function showDialog() {
    var whitebg = document.getElementById("white-background");
    var dlg = document.getElementById("dlgbox");
    whitebg.style.display = "block";
    dlg.style.display = "block ";
    var winWidth = window.innerWidth;
    var winheight = window.innerHeight;
    dlg.style.left = (winWidth / 2) - 480 / 2 + "px";
    dlg.style.top = "150px";
}

function select_image() {
        document.getElementById('file_upload').click();
}


function zoom_in(e) {
    var whitebg = document.getElementById("zoom_image");
    var dlg = document.getElementById("inner");
    whitebg.style.display = "block ";
    dlg.style.display = "block ";
    document.getElementById("zoom_out").src=e.src;

}

function img_small() {
    var whitebg = document.getElementById("zoom_image");
    var dlg = document.getElementById("inner");
    whitebg.style.display = "none ";
    dlg.style.display = "none ";
}

function show_vedious() {
    document.getElementById("img_div").style.display = "none";
    document.getElementById('vedio_div').style.display = "block";
}

function show_images() {
    document.getElementById("vedio_div").style.display = "none";
    document.getElementById('img_div').style.display = "block";

}

function select_vedio() {
        document.getElementById('vedio_upload').click();
}

function show_gallry() {
    var dlg = document.getElementById('gallry');
    var whitebg = document.getElementById('gallry_outer');
    whitebg.style.display = "block ";
    dlg.style.display = "block ";
    dlg.style.left = "100px";
    dlg.style.top = "50px ";
}

function hide_galry() {
    var dlg = document.getElementById('gallry');
    var whitebg = document.getElementById('gallry_outer');
    whitebg.style.display = "none ";
    dlg.style.display = "none";
}

function upload_vedio(){
      document.getElementById('vedio_add').click();
}

</script>
</body>

</html>