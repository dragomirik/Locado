<?php 
if ( stristr($_SERVER['HTTP_USER_AGENT'], 'MSIE') ){
header("Location: browser.php");
} 
?>