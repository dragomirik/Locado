function edit_rec_page_ask(id,title,url){
document.getElementById("modal_window").innerHTML = "<center><form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return false\"><fieldset><p class=\"placeholder\">Title</p><input type=\"text\" id=\"title\" value=\""+title+"\" style=\"width:200px;\" /><p class=\"placeholder\">URL</p><input type=\"text\" id=\"url\" value=\""+url+"\" style=\"width:200px;\" /></fieldset><input type=\"button\" class=\"button\" onclick=\"edit_rec_page("+id+")\" value=\"   Go   \" /></form></center>";
	window.location = "#php_report";
	}

	function edit_rec_page(id){
	JsHttpRequest.query(
            '../backend/edit_rec_page.php',
            { 
					'id': id,
					'title': document.getElementById("title").value,
					'url'  : document.getElementById("url").value,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("fr_table").innerHTML = result["str1"];
                /*document.getElementById("modal_window").innerHTML = result["str2"];*/
				window.location = "#";
                }
            },
            false
        );
	}

	function add_r_page(){
	JsHttpRequest.query(
            '../backend/add_r_page.php',
            { 
					'title': document.getElementById("title").value,
					'url'  : document.getElementById("url").value,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("fr_table").innerHTML = result["str1"];
				window.location = "#";
                document.getElementById("modal_window").innerHTML = result["str2"];
                }
            },
            false
        );
	}

	function del_rec_page(id){
	JsHttpRequest.query(
            '../backend/del_rec_page.php',
            { 
					'id': id,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("fr_table").innerHTML = result["str1"];
                document.getElementById("modal_window").innerHTML = result["str2"];
				window.location = "#";
                }
            },
            false
        );
	}
	function rec_page_up(id){
	JsHttpRequest.query(
            '../backend/rec_page_up.php',
            { 
					'id': id,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("fr_table").innerHTML = result["str1"];
                }
            },
            false
        );
	}
	function rec_page_down(id){
		JsHttpRequest.query(
            '../backend/rec_page_down.php',
            { 
					'id': id,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("fr_table").innerHTML = result["str1"];
                }
            },
            false
        );
	}
	function del_page_ask(id,page) {
document.getElementById("modal_window").innerHTML = "Видалити <span class=\"color1\">"+page+"</span>?<br\> <center><a onclick=\"del_page("+id+")\">Так</a>&nbsp;&nbsp;&nbsp;<a alt=\"\" title=\"\" href=\"#\">Ні</a></center>";
	window.location = "#php_report";
    }

function add_r_page_ask(){
document.getElementById("modal_window").innerHTML = "<center><form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return false\"><fieldset><p class=\"placeholder\">Title</p><input type=\"text\" id=\"title\" style=\"width:200px;\" /><p class=\"placeholder\">URL</p><input type=\"text\" id=\"url\" style=\"width:200px;\" /></fieldset><input type=\"button\" class=\"button\" onclick=\"add_r_page()\" value=\"   Go   \" /></form></center>";
window.location = "#php_report";
}