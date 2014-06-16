<?php hide_module();?>
<form method="post" action="<?php echo "".site_name()."";?>/search_view.php" style="margin-top:10px;margin-bottom:10px; text-align:center;">
<span style="margin:0px;padding:0px;" class="inputs"><input name="search" type="text" title="<?php echo word(31);?>" style="width:150px;margin:0px;  border-top-right-radius:0px; border-bottom-right-radius:0px; top:0px; max-height:19px; height:30px; position:relative;" /></span><input name="searchb" type="submit" value="<?php echo word(29);?>"  class="button" style="padding:3px;width:65px;margin:0px; margin-left:-1px; height:30px; max-height:29px; border-top-left-radius:0px; border-bottom-left-radius:0px;position:relative;<?php
if ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE') ){
echo "top:0px;";
}
if ( stristr($_SERVER['HTTP_USER_AGENT'], 'Gecko') ){
echo "top:1px;";
}
if ( stristr($_SERVER['HTTP_USER_AGENT'], 'Safari') && stristr($_SERVER['HTTP_USER_AGENT'], 'Version')){
echo "top:0px;";
}
if ( stristr($_SERVER['HTTP_USER_AGENT'], 'KHTML') && stristr($_SERVER['HTTP_USER_AGENT'], 'Chrome')){
echo "top:0px;";
}
if ( stristr($_SERVER['HTTP_USER_AGENT'], 'AppleWebKit') && stristr($_SERVER['HTTP_USER_AGENT'], '535.7') ){
echo "top:-1px;";
}/* else{
 if ( stristr($_SERVER['HTTP_USER_AGENT'], 'Mozilla') ){
if ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE') ){
echo "top:-1px;";
} else {echo "top:1px;";}}}*/ ?> -moz-top:1px;  padding:0; display:inline-block;" />
</form>