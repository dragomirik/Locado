function webmountviewer(id) {
lostk = document.getElementById('lostk').alt;
count = document.getElementById('lostk').innerHTML;
pos = document.getElementById('j'+id).innerHTML;
WinWidth = document.getElementById('webmountgallery').offsetWidth;
step = Math.floor(WinWidth / 102);
mk = 1;
for (i = 1; i<=pos; i = i + step){}
i = i - step;
document.getElementById('k'+i).style.display = "block";
document.getElementById('k'+i).style.width = "100%";
document.getElementById('k'+i).style.background = "url('gallery/1/bg.gif')";
label = document.getElementById('i'+id).title;
if (id==1) {
left1 = "";} else {
left1 = "<span class=\"left_arrow\" onclick=\"webmountviewer("+(id-1)+")\"></span>";}
if (id==count) {
right1 = "";} else {
right1 = "<span class=\"right_arrow\" onclick=\"webmountviewer("+(id+1)+")\"></span>";}
document.getElementById('k'+i).innerHTML = left1+"<span class=\"WebMountImgS\"><img class=\"WebMountImg\" id=\"imgk"+(id)+"\" src=\""+document.getElementById('i'+id).alt+"\" onload=\"wm_size("+id+")\"/></span>"+right1+"<br /><span class=\"WMLabel\">"+label+"</span><style type=\"text/css\">.WebMountImgS{width:"+(WinWidth-140)+"px;}.WebMountImg{max-width:"+(WinWidth-150)+"px;}.right_arrow,.left_arrow{background:none;}</style>";
document.getElementById('lostk').alt = i;
/**/window.location = '#k'+(i-step);/**/
if (i!=lostk) {
document.getElementById('k'+lostk).style.display = "none";
document.getElementById('k'+lostk).innerHTML = "";}
}

function wm_size(id){
ImgH = document.getElementById('imgk'+id).offsetHeight;
document.getElementById('style_wm').innerHTML = "<style type=\"text/css\">.right_arrow,.left_arrow{height:"+ImgH+"px;}.right_arrow{background: url('img/gal_r.png') no-repeat center center;} .right_arrow:hover{background: url('img/gal_1_r.png') no-repeat center center;}.left_arrow{background: url('img/gal_l.png') no-repeat center center; } .left_arrow:hover{background: url('img/gal_1_l.png') no-repeat center center;}</style>";
}