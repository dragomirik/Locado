<?php hide_module();
if (user('u14'))
{
/*POST METHOD BEGIN*/
if (isset($_POST['btn'])) {
if (isset($_POST['type']) && preg_code($_POST['type'])){
$type = $_POST['type'];
$update = mysql_query("UPDATE `site` SET `gal`='$type'");
if ($update) {$report = "Зміни збережено";} else {$report = "Помилка при збереженні даних";}
echo "  <script type=\"text/javascript\">
		document.getElementById('modal_window').innerHTML = '".$report."';
		window.location = \"#php_report\";
		</script>";
}
}
/*POST METHOD END*/
$sgal = setting('gal');
echo "<div><form action=\"\" method=\"post\">
<input type=\"submit\" class=\"button\" name=\"btn\" value=\"Застосувати обраний тип галереї\" style=\"margin-left: 0px; margin-right: 10px; margin-top:5px; display:inline-block; float:right;\">
<fieldset class=\"inputs\" style=\" display:inline-block; margin-right:10px; float:right;\"><select name=\"type\" id=\"type\" class=\"inputs\" required=\"required\" style=\"width:214px;\" onchange=\"gallery_description()\">";
echo "<option value=\"g1\" ";
if ($sgal == "g1") {echo " selected=\"selected\" ";}
echo " >WebMountViewer</option>";/*
echo "<option value=\"g2\" ";
if ($sgal == "g2") {echo " selected=\"selected\" ";}
echo " >Photoslider</option>";*/
echo "<option value=\"g3\" ";
if ($sgal == "g3") {echo " selected=\"selected\" ";}
echo " >Simple</option>";
echo "<option value=\"g4\" ";
if ($sgal == "g4") {echo " selected=\"selected\" ";}
echo " >PrettyGallery</option>";
echo "<option value=\"g5\" ";
if ($sgal == "g5") {echo " selected=\"selected\" ";}
echo " >Touchwipe</option>";
echo "<option value=\"g6\" ";
if ($sgal == "g6") {echo " selected=\"selected\" ";}
echo " >PiroBox</option>";/*
echo "<option value=\"g7\" ";
if ($sgal == "g7") {echo " selected=\"selected\" ";}
echo " >Interface</option>";*/
echo "<option value=\"g8\" ";
if ($sgal == "g8") {echo " selected=\"selected\" ";}
echo " >Image Magick</option>";
echo "<option value=\"g9\" ";
if ($sgal == "g9") {echo " selected=\"selected\" ";}
echo " >FancyBox</option>";
echo "<option value=\"g10\" ";
if ($sgal == "g10") {echo " selected=\"selected\" ";}
echo " >SuperGallery</option>";
echo "<option value=\"g11\" ";
if ($sgal == "g11") {echo " selected=\"selected\" ";}
echo " >MultiBox</option>";
echo "<option value=\"g12\" ";
if ($sgal == "g12") {echo " selected=\"selected\" ";}
echo " >Ad-gallery</option>";
echo "</select>
</fieldset>
</form><br /><br /><br /><span style=\"float:right; margin-right:10px; margin-bottom:10px;\">[ <span onclick=\"add_image_ask()\" class=\"a_menu\">Додати зображення</span> ]</span></div><div id=\"gall_desk\"></div> <br /><br />";
}

/*echo "  <script type=\"text/javascript\">
	alert(document.getElementById('content').offsetWidth+' '+document.getElementById('cub').alt);
</script>";*/
$sgal = setting('gal');
if ($sgal=='g1') {
echo "<style type=\"text/css\">
.webmountgallery{
margin:0px;
padding:0px;
width: 100%;
}
.wmdimg {
display:inline-block;
margin:10px;
border:0;
padding:0px;
width:80px;
height: 60px;
}
.wmimg {
background: url(img/loader.gif) no-repeat center;
width:78px;
height: 60px;
border:1px solid #ccc;
padding:0px;
margin:0px;
}
.wmimg:hover {
border:1px solid #000;
}
.WebMountImg{
background: url(img/loader.gif) no-repeat center;
margin:10px;
max-height: 800px;
min-height:20px;
min-width:30px;
}
.WebMountImgS{
text-align:center;
display:inline-block;
}
.right_arrow{
display:inline-block;
width: 30px;
min-height:85px;
cursor:pointer;
margin-right:20px;
margin-left:20px;
float:right;
}
.left_arrow{
display:inline-block;
width: 30px;
min-height:85px;
cursor:pointer;
margin-right:20px;
margin-left:20px;
float:left;
}
.WMLabel{
padding:10px;
padding-top:0px;
text-align:center;
color: rgba(255,255,255,0.7);
font-size:16px;
display:block;
/*font-weight:bold;*/
}
</style>
<script type=\"text/javascript\" src=\"gallery/1/js.js\"></script>";
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
echo "<div id=\"webmountgallery\">";
$my_row = mysql_fetch_array($query);
$d = 0;
do {
$d++;
echo "<div id=\"k$d\" class=\"display_img\" style=\"display:hidden; display:inline-block;\"></div><div class=\"hidden\" id=\"j$d\">$d</div><div class=\"wmdimg\"><img id=\"i$d\" src=\"".$my_row['prview']."\" alt=\"".$my_row['urlfull']."\" title=\"".$my_row['title']."\" class=\"wmimg\" onclick=\"webmountviewer($d)\" style=\"cursor:pointer;\" />";
echo "</div>";
} while ($my_row = mysql_fetch_array($query));
echo "<div id=\"lostk\" alt=\"0\" style=\"position:absolute; left:-9999px;\">".mysql_num_rows($query)."</div><div id=\"style_wm\" style=\"position:absolute; left:-9999px;\"></div></div>";
}}
if ($sgal=='g7') {
echo "
<script type=\"text/javascript\" src=\"gallery/7/jquery.js\"></script>
<script type=\"text/javascript\" src=\"gallery/7/interface.js\"></script>
<style type=\"text/css\" media=\"screen\">
#slideShow2
{
width: 300px;
height: 300px;
border: 1px solid #ccc;
padding: 10px;
background-color: #fff;
margin: 10px;
}
.pagelinks a
{
font-weight: bold;
color: #666;
}
.slideCaption
{
background-color: #FFFFCC;
padding: 4px;
text-align: center;
font-weight: bold;
}
.pagelinks a.activeSlide
{
color: #f90;
}
/* this is for IE so the prev/next links can be hovered*/
.nextSlide,.prevSlide
{
background-image: url(gallery/7/images/spacer.gif);
}
.nextSlide:hover
{
background-image: url(gallery/7/images/nextslide.jpg);
background-repeat: no-repeat;
background-position: right bottom;
}
.prevSlide:hover
{
background-image: url(gallery/7/images/prevslide.jpg);
background-repeat: no-repeat;
background-position: left bottom;
}
.inputsTooltip
{
border: 1px solid #ccc;
background-color: #eee;
padding: 4px;
color: #333;
font-family: Arial, Helvetica, sans-serif;
font-size: 11px;
filter:alpha(opacity=70);
-moz-opacity:.70;
opacity:.70;}
#tooltipURL
{
display: none;
}</style><div id=\"slideShow2\">
  </div><script type=\"text/javascript\">
  $(document).ready(
function()
{
$.slideshow(
{
container : 'slideShow2',
loader: 'gallery/7/images/loader.jpg',
linksPosition: 'top',
linksClass: 'pagelinks',
linksSeparator : ' | ',
fadeDuration : 400,
activeLinkClass: 'activeSlide',
nextslideClass: 'nextSlide',
prevslideClass: 'prevSlide',
captionPosition: 'bottom',
captionClass: 'slideCaption',
autoplay: 5,
images : [
";
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
$coma = "";
do {
$d++;
echo "$coma
{
src: '".$my_row['urlfull']."',
caption: '".$my_row['title']."'
}";
$coma = ",";
} while ($my_row = mysql_fetch_array($query));
}
echo "
]
}
)
 $('a').ToolTip(
{
className: 'inputsTooltip',
position: 'mouse'
}
);
}
);
</script>";
}
if ($sgal=='g6') {
echo "
<link href=\"gallery/6/css_pirobox/pirobox.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"gallery/6/js/jquery.js\"></script>
<script type=\"text/javascript\" src=\"gallery/6/js/pirobox_packed.js\"></script>

<script type=\"text/javascript\">
$(document).ready(function(){

<!--Настройки для варианта, когда кнопки навиг. расположены поверх фото -->

	$('.thumbs').piroBox({
			border: 10,
			borderColor : '#222', 
			mySpeed: 500, 
			bg_alpha: 0.5,
			cap_op_start : 0.4,
			cap_op_end: 0.8,
			pathLoader : '#000 url(gallery/6/css_pirobox/ajax-loader.gif) center center no-repeat;', 
			gallery : '.gallery_in li a', 
			gallery_li : '.gallery_in li', 
			next_class : '.next_in',
			previous_class : '.previous_in'
	});	

<!--Настройки для варианта, когда кнопки навиг. расположены за фото-->
	$('.thumbs').piroBox({
	
			border: 1, 
			mySpeed: 700,
			borderColor : '#444',  
			bg_alpha: 0.5,
			cap_op_start : 0.4,
			cap_op_end: 0.8,
			pathLoader : '#000 url(gallery/6/css_pirobox/ajax-loader.gif) center center no-repeat;', 
			gallery : '.gallery li a', 
			gallery_li : '.gallery li',
			single : '.single  a',
			next_class : '.next',
			previous_class : '.previous'
	});	
});

</script>
            <div class=\"gallery_in\">
                <ul>";
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
do {
$d++;
echo "<li>
     <a href=\"".$my_row['urlfull']."\"  title=\"".$my_row['urlfull']."\" ><img src=\"".$my_row['prview']."\" alt=\"demo\"/></a>
 </li>";
} while ($my_row = mysql_fetch_array($query));
}
                   echo" ";
            echo "</ul>
            </div>
";
}
if ($sgal=='g5') {
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"gallery/5/css/demo.css\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"gallery/5/css/style.css\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"gallery/5/css/elastislide.css\" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />
		<noscript>
			<style>
				.es-carousel ul{
					display:block;
				}
			</style>
		</noscript>
		<script id=\"img-wrapper-tmpl\" type=\"text/x-jquery-tmpl\">	
			<div class=\"rg-image-wrapper\">
				{{if itemsCount > 1}}
					<div class=\"rg-image-nav\">
						<a href=\"#\" class=\"rg-image-nav-prev\">Предыдущее изображение</a>
						<a href=\"#\" class=\"rg-image-nav-next\">Следующее изображение</a>
					</div>
				{{/if}}
				<div class=\"rg-image\"></div>
				<div class=\"rg-loading\"></div>
				<div class=\"rg-caption-wrapper\">
					<div class=\"rg-caption\" style=\"display:none;\">
						<p></p>
					</div>
				</div>
			</div>
		</script><div id=\"rg-gallery\" class=\"rg-gallery\" style=\"margin-left:10px;margin-right:10px; margin-bottom:10px;\">
					<div class=\"rg-thumbs\">
						<!-- Elastislide Carousel Thumbnail Viewer -->
						<div class=\"es-carousel-wrapper\">
							<div class=\"es-nav\">
								<span class=\"es-nav-prev\">Попереднє</span>
								<span class=\"es-nav-next\">Наступне</span>
							</div>
							<div class=\"es-carousel\">
								<ul>";						
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
do {
$d++;
echo "<li><a href=\"#\"><img src=\"".$my_row['prview']."\" data-large=\"".$my_row['urlfull']."\" alt=\"".$my_row['title']."\" data-description=\"".$my_row['title']."\" style=\"width:65px; height:50px;\" /></a></li>";
} while ($my_row = mysql_fetch_array($query));
}
echo "</ul>
							</div>
						</div>
						<!-- End Elastislide Carousel Thumbnail Viewer -->
					</div><!-- rg-thumbs -->
				</div>
				
				<script type=\"text/javascript\" src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js\"></script>
		<script type=\"text/javascript\" src=\"gallery/5/js/jquery.tmpl.min.js\"></script>
		<script type=\"text/javascript\" src=\"gallery/5/js/jquery.easing.1.3.js\"></script>
		<script type=\"text/javascript\" src=\"gallery/5/js/jquery.elastislide.js\"></script>
		<script type=\"text/javascript\" src=\"gallery/5/js/gallery.js\"></script>";
}

if ($sgal=='g4') {
echo "<link rel=\"stylesheet\" href=\"gallery/4/scripts/styleGallery.css\" type=\"text/css\" media=\"screen\" title=\"prettyDropdown main stylesheet\" charset=\"UTF-8\" />

<script src=\"gallery/4/scripts/jQuery 1.2.6.js\" type=\"text/javascript\"></script>

<link rel=\"stylesheet\" href=\"gallery/4/scripts/prettyGallery.css\" type=\"text/css\" media=\"screen\" title=\"prettyDropdown main stylesheet\" charset=\"UTF-8\" />

<script src=\"gallery/4/scripts/prettyGallery.js\" type=\"text/javascript\" charset=\"UTF-8\"></script>

<link rel=\"stylesheet\" href=\"gallery/4/scripts/prettyPhoto.css\" type=\"text/css\" media=\"screen\" charset=\"UTF-8\" />

<script src=\"gallery/4/scripts/prettyPhoto.js\" type=\"text/javascript\" charset=\"UTF-8\"></script>

<div style=\"margin:10px;\">
<ul class=\"gallery\">
";						
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
do {
$d++;
echo "<li><a href=\"".$my_row['urlfull']."\" rel=\"prettyPhoto[gallery]\"><img src=\"".$my_row['prview']."\" width=\"80\" height=\"60\" title=\"".$my_row['title']."\" alt=\"$d\" /></a></li>";
} while ($my_row = mysql_fetch_array($query));
}
echo "</ul></div>
<script type=\"text/javascript\" charset=\"utf-8\">

$(\"a[rel^='prettyPhoto']\").prettyPhoto({showTitle:false}); 

$('ul.gallery:first').prettyGallery({itemsPerPage:5, navigation:'bottom', animationSpeed:'fast'});

</script> ";
}
if ($sgal=='g2') {
echo "<script type=\"text/javascript\" src=\"gallery/2/jquery.js\"></script>

        <script type=\"text/javascript\" src=\"gallery/2/photoslider.js\"></script>

        <link href=\"gallery/2/photoslider.css\" rel=\"stylesheet\" type=\"text/css\">
		
		<script type=\"text/javascript\"> 

          $(document).ready(function(){ 

FOTO.Slider.baseURL = ''; 

FOTO.Slider.bucket = { 

'default': {  
";						
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
$array = "0";
do {
if ($d!=0) {$array .= ",".$d;}
echo "$d: {'thumb': '".$my_row['prview']."', 'main': '".$my_row['urlfull']."'},";

$d++;
} while ($my_row = mysql_fetch_array($query));
}
echo "
} 

}; 

var ids = new Array($array); 

FOTO.Slider.importBucketFromIds('default',ids); 

}); 

</script><p><div class=\"photoslider\" id=\"default\"></div></p><script type=\"text/javascript\"> 

$(document).ready(function(){ 

var ids = new Array($array); 

FOTO.Slider.importBucketFromIds('default',ids); 

FOTO.Slider.reload('default'); 

FOTO.Slider.preloadImages('default'); 

FOTO.Slider.enableSlideshow('default'); 

}); 

</script> ";
}

if ($sgal=='g3') {
echo '<style type="text/css">

#large {
	width: 450px;
	height: 450px;
	float: left;
	margin-top: 50px;
	margin-left: 20px;
	margin-right: 5px;
	background: url(gallery/3/indicato.gif) no-repeat 50% 40%;
}
#large img {
	width: 450px;
	height: 363px;
	border: 5px solid #223348;
}
#thumbnail {
	width: 250px;
	height: 356px;
	overflow: auto;
	list-style: none;
	margin-top: 50px;
	margin-left: 26px;
	_margin-left: 8px;
	padding: 5px;
	border: 3px solid #223348;
	background: #fff;
}
#thumbnail li {
	float: left;
	width: 79px;
	margin: 8px;
	_margin: 5px;
}
#thumbnail a {
	display: block;
	width: 75px;
	height: 56px;
	padding: 1px;
	border: 1px solid #ccc;
}
#thumbnail a:hover {
	border-color: #405061;
}
</style>

<script type="text/javascript" src="gallery/3/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#thumbnail li a").click(function(){
		$("#large img").hide().attr({"src": $(this).attr("href"), "title": $("> img", this).attr("title")});
		$("#large h2").html($("> img", this).attr("title"));
		return false;
	});
	$("#large>img").load(function(){$("#large>img:hidden").fadeIn("slow")});
});
</script>
';						
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
$blur = 0;
do {
$d++;
if ($blur == 0) {
echo "<div id=\"large\">
<img src=\"".$my_row['urlfull']."\" title=\"".$my_row['title']."\" alt=\"".$my_row['prview']."\" />
</div>
<ul id=\"thumbnail\">";
}
$blur = 1;
echo "<li><a href=\"".$my_row['urlfull']."\"><img src=\"".$my_row['prview']."\" title=\"".$my_row['title']."\" alt=\"".$my_row['urlfull']."\" /></a></li>";
} while ($my_row = mysql_fetch_array($query));
echo "</ul>";
}
}

if ($sgal=='g8') {
echo '<div id="slideShowContainer">
	
    <div id="slideShow">
    <link rel="stylesheet" type="text/css" href="gallery/8/css/styles.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<script src="gallery/8/js/script.js"></script>
    	<div id="pictures">

';						
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
do {
$d++;
echo "<img src=\"".$my_row['urlfull']."\" alt=\"".$my_row['title']."\" title=\"".$my_row['title']."\"/>";
} while ($my_row = mysql_fetch_array($query));
}
echo '	</div>
    
    </div>
    
    <a id="previousLink" href="#">&raquo;</a>
    <a id="nextLink" href="#">&laquo;</a>
    
</div>
';
}

if ($sgal=='g9') {
echo '<link rel="stylesheet" type="text/css" href="gallery/9/css/style.css" />
    <link rel="stylesheet" type="text/css" href="gallery/9/fancybox/jquery.fancybox-1.2.6.css" />

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="gallery/9/js/jquery-css-transform.js"></script>
    <script type="text/javascript" src="gallery/9/js/jquery-animate-css-rotate-scale.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="gallery/9/fancybox/jquery.fancybox-1.2.6.pack.js"></script>
    <script type="text/javascript" src="gallery/9/js/main.js"></script><div id="gallery">';						
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
do {
$d++;
echo "<div id=\"$d\" style=\"background-image:url('".$my_row['prview']."')\">
            <a class=\"fancybox\" href=\"".$my_row['urlfull']."\" target=\"_blank\">".$my_row['title']."</a>
        </div>";
} while ($my_row = mysql_fetch_array($query));
}
echo '</div>';
}

if ($sgal=='g10') {
echo '
<link rel="stylesheet" type="text/css" href="gallery/10/lightbox/css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="gallery/10/demo.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="gallery/10/lightbox/js/jquery.lightbox-0.5.pack.js"></script>
<script type="text/javascript" src="gallery/10/script.js"></script>
<div id="gallery">';						
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
do {
$d++;
$nomargin='nomargin';
echo "<div class=\"pic ".$nomargin."\" style=\"background:url('".$my_row['urlfull']."') no-repeat 50% 50%;\">
		<a href=\"".$my_row['urlfull']."\" title=\"".$my_row['title']."\" target=\"_blank\">".$my_row['title']."</a>
		</div>";
} while ($my_row = mysql_fetch_array($query));
}
echo '</div>';
}

if ($sgal=='g11') {
echo '
<link href="gallery/11/css/multibox.css" rel="stylesheet" type="text/css" /> 
<link rel="stylesheet" href="gallery/11/css/ie6.css" type="text/css" media="all" />
 
<script type="text/javascript" src="gallery/11/js/mootools.js"></script> 
<script type="text/javascript" src="gallery/11/js/overlay.js"></script> 
<script type="text/javascript" src="gallery/11/js/multibox.js"></script> 
 

<style type="text/css"> 
 
#htmlElement {
	padding: 10px;
	background-color: #000;
}
 
</style> 
<div id=\"gall_desk\"></div><br />';						
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
do {
$d++;
echo '<a href="'.$my_row['urlfull'].'" id="mb1" class="mb" title="'.$my_row['title'].'"><img src="'.$my_row['prview'].'" alt="'.$my_row['title'].'" border="0" /></a> 
  			<div class="multiBoxDesc mb1"></div>';
} while ($my_row = mysql_fetch_array($query));
}
echo "
		<script type=\"text/javascript\"> 
			var box = {};
			window.addEvent('domready', function(){
				box = new MultiBox('mb', {descClassName: 'multiBoxDesc', useOverlay: true});
			});
		</script> ";
}

if ($sgal=='g12') {
echo '
  <link rel="stylesheet" type="text/css" href="gallery/12/jquery.ad-gallery.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script type="text/javascript" src="gallery/12/jquery.ad-gallery.js?rand=995"></script>
  <script type="text/javascript">
  $(function() {
    var galleries = $(\'.ad-gallery\').adGallery();
  });
  </script>

  <style type="text/css">
  #gallery {
    padding: 30px;
  }
  </style>
 
    <div id="gallery" class="ad-gallery">
      <div class="ad-image-wrapper">
      </div>
      <div class="ad-controls">
      </div>
      <div class="ad-nav">
        <div class="ad-thumbs">
          <ul>';						
$query = mysql_query("SELECT * FROM `gallery` WHERE 1 ORDER BY `id` DESC");
if (mysql_num_rows($query)==0){
echo "Зображення відсутні";
} else {
$my_row = mysql_fetch_array($query);
$d = 0;
do {
echo ' <li>
              <a href="'.$my_row['urlfull'].'">
                <img src="'.$my_row['prview'].'" title="'.$my_row['title'].'" longdesc="" class="image'.$d.'">
              </a>';
$d++;
} while ($my_row = mysql_fetch_array($query));
}
echo "          </ul>
        </div>
      </div>
    </div>";
}
?>