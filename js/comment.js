	function comment(id,host,mode) {
		/*else{
		alert(document.getElementById("com_block").innerHTML.length);}
					str = "http://www.yandex.ru/";
					(str)
					if (mode==2){
					'title': document.getElementById("title").value,
                    'upl5': document.getElementById("error5").innerHTML,
                    'id': id,
					'rand': Math.random(0,65530)
					}*/
		if (mode==1) {
		if (document.getElementById("com_block").innerHTML.length==68){
		repl = "";} 
		else {repl = document.getElementById("com_block").innerHTML;} 
		if (id==1){
        JsHttpRequest.query(
            '../backend/comments.php',
            { 
					'mode':mode,
					'repl':repl,
					'host':host,
					'author': document.getElementById("author").value,
                    'text1': document.getElementById("text").value,
                    'pr': document.getElementById("pr").value,
                    'id': document.getElementById("id").value,
                    'capcha': document.getElementById("capcha").value,
					'rand': Math.random(0,65530)
            },function(result, errors) {document.getElementById("debug").innerHTML = errors;if (result) {
                    document.getElementById("com_block").innerHTML = result["str"]+repl;
                    document.getElementById("com_add_form").innerHTML = result["str2"];
					}},false);} else {
        JsHttpRequest.query(
            '../backend/comments.php',
            {
					'mode':mode,
					'repl':repl,
					'host':host,
                    'text1': document.getElementById("text").value,
                    'id': document.getElementById("id").value,
					'rand': Math.random(0,65530)
            },function(result, errors) {document.getElementById("debug").innerHTML = errors;if (result) {
                    document.getElementById("com_block").innerHTML = result["str"]+repl;
                    document.getElementById("com_add_form").innerHTML = result["str2"];
					}},false);}}
    }
	function del_comment(id){
	JsHttpRequest.query(
        '../backend/del_comment.php',
        { 
			'id': id,
			'rand': Math.random(0,65530)
        },
        function(result, errors) {
            document.getElementById("debug").innerHTML = errors; 
            if (result) {
            document.getElementById("c"+id).style.opacity = result['op'];
            document.getElementById("t"+id).innerHTML = result["str"];
            document.getElementById("sr"+id).innerHTML = result['out'];
            }
        },
        false
    );
}

function redel_comment(id){
	JsHttpRequest.query(
        '../backend/redel_comment.php',
        { 
			'id': id,
			'rand': Math.random(0,65530)
        },
        function(result, errors) {
            document.getElementById("debug").innerHTML = errors; 
            if (result) {
            document.getElementById("t"+id).innerHTML = result["str"];
            document.getElementById("c"+id).style.opacity = result["op"];
            }
        },
        false
    );
}

function edit_comment(id){
document.getElementById("txt"+id).innerHTML = "<textarea style=\"height:"+"100px"+";\" id=\"tedit"+id+"\" >"+document.getElementById("txt"+id).innerHTML+"</textarea><br/><input type=\"submit\" class=\"button\" value=\"   Зберегти коментар   \" style=\"margin-top:0px; margin-left:0px; margin-bottom:0px;\" onclick=\"edit_comment_save("+id+")\">  <input type=\"button\" class=\"button\" value=\"   Відмінити   \" style=\"margin-top:0px; margin-left:0px; margin-bottom:0px;\" onclick=\"edit_comment_back("+id+")\">";
document.getElementById("txt"+id).id = "edit"+id;
}

 function clear_comment() {
	JsHttpRequest.query(
     '../backend/clear_comment.php',
     { 
		'rand': Math.random(0,65530)
     }, 
     function(result, errors) {
         document.getElementById("debug").innerHTML = errors; 
         if (result) {
         document.getElementById("modal_window").innerHTML = result["str"];
			window.location = "#php_report";
         }
     },false);
	 }
	 
	 function del_comment_admin(id) {
	 del_comment(id);
	 } 
	 
	 function redel_comment_admin(id) {
	 redel_comment(id);
	 document.getElementById("bs"+id).innerHTML = "<img alt=\"\" title=\"\"  src=\"img/icon/null.png\"/>";
	 }


	 function edit_comment_save(id){
	JsHttpRequest.query(
     '../backend/edit_comment_save.php',
     { 
		'id': id,
		'comment': document.getElementById("tedit"+id).value,
		'rand': Math.random(0,65530)
     }, 
     function(result, errors) {
         document.getElementById("debug").innerHTML = errors; 
         if (result) {
         document.getElementById("tedit"+id).value = result["str"];
         }
     },false);
	 document.getElementById("edit"+id).innerHTML = document.getElementById("tedit"+id).value;
	 document.getElementById("edit"+id).id = "txt"+id;
	 }
	 
	 function edit_comment_back(id){
	 document.getElementById("edit"+id).innerHTML = document.getElementById("tedit"+id).value;
	 document.getElementById("edit"+id).id = "txt"+id;
	 }
	function comment_admin_edit_ask(id){
		document.getElementById("modal_window").innerHTML = "<form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return false\"><fieldset><p class=\"placeholder\">Назва картинки</p><input type=\"text\" id=\"title\" style=\"width:200px;\" /><p class=\"placeholder\">Посилання на зображення</p><input type=\"text\" id=\"urlfull\" style=\"width:200px;\" /><p class=\"placeholder\">Посилання на мініатюру</p><input type=\"text\" id=\"prview\" style=\"width:200px;\" /></fieldset><input type=\"button\" class=\"button\" onclick=\"add_image()\" style=\"width:80px; margin-left:5px; \" value=\"   Go   \" /></form>";
			window.location = "#php_report";
	}
	function comment_admin_edit_ask(id){
	JsHttpRequest.query(
     '../backend/add_image.php',
     { 
		'title': document.getElementById("title").value,
		'prview'  : document.getElementById("prview").value,
		'urlfull'  : document.getElementById("urlfull").value,
		'rand': Math.random(0,65530)
     }, 
     function(result, errors) {
         document.getElementById("debug").innerHTML = errors; 
         if (result) {
		 window.location = "#";
         document.getElementById("modal_window").innerHTML = result["str"];
			window.location = "#php_report";
         }
     },false);}