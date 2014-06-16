<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
// Init JsHttpRequest and specify the encoding. It's important!
$JsHttpRequest = new JsHttpRequest("utf-8");
// Fetch request parameters.
$id = $_REQUEST['id'];
$upl = $id;
$GLOBALS['_RESULT'] = array(
      "str"   => $upl,
    );
if ($_REQUEST['str'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
