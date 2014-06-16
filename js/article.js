function add() {
/*document.getElementById("text").value = myEditor.getHTMLBody();*/
        JsHttpRequest.query(
            '../backend/add_a.php',
            { 
					'title': document.getElementById("title").value,
                    'meta_d': document.getElementById("meta_d").value,
                    'meta_k': document.getElementById("meta_k").value,
                    'desk': myEditor2.getHTMLBody(),
                    'text': myEditor.getHTMLBody(),
                    'spec': document.getElementById("spec").value,
                    'sourse': document.getElementById("sourse").value,
					
                    'an_1': document.getElementById("an_1").value,
                    'an_2': document.getElementById("an_2").value,
                    'an_3': document.getElementById("an_3").value,
                    'an_4': document.getElementById("an_4").value,
                    'an_5': document.getElementById("an_5").value,
					
                    'a_1': document.getElementById("a_1").value,
                    'a_2': document.getElementById("a_2").value,
                    'a_3': document.getElementById("a_3").value,
                    'a_4': document.getElementById("a_4").value,
                    'a_5': document.getElementById("a_5").value,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                    document.getElementById("modal_window").innerHTML = result["str2"];
                    document.getElementById("slovo").innerHTML = result["str1"];
                }
            },
            false
        );
    }
		function add_error(cub) {
        JsHttpRequest.query(
            '../backend/adderror.php',
            { 
					'title': document.getElementById("title").value,
                    'meta_d': document.getElementById("meta_d").value,
                    'meta_k': document.getElementById("meta_k").value,
                    'desk': document.getElementById("desk").value,
                    'text': document.getElementById("text").value,
					'upl1': document.getElementById("error1").innerHTML,
                    'upl2': document.getElementById("error2").innerHTML,
                    'upl3': document.getElementById("error3").innerHTML,
                    'upl4': document.getElementById("error4").innerHTML,
                    'upl5': document.getElementById("error5").innerHTML,
                    'cub': cub
            }, 
			
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                    document.getElementById("error1").innerHTML = result["str1"];
                    document.getElementById("error2").innerHTML = result["str2"];
                    document.getElementById("error3").innerHTML = result["str3"];
                    document.getElementById("error4").innerHTML = result["str4"];
                    document.getElementById("error5").innerHTML = result["str5"];
                }},false );}
function change(tag) {
    JsHttpRequest.query(
        '../backend/change.php',
        {
            'id': tag,
			'rand': Math.random(0,65530)
        }, 
        function(result, errors) {
            document.getElementById("debug").innerHTML = errors; 
            if (result) {
                document.getElementById(tag).src = result["str"];
            }
        },
        false
    );
}	
function del_a(tag) {
    JsHttpRequest.query(
        '../backend/delete.php',
        {
            'id': tag,
			'rand': Math.random(0,65530)
        }, 
        function(result, errors) {
            document.getElementById("debug").innerHTML = errors; 
            if (result) {
                document.getElementById("d"+tag).style.opacity = "0.5";
                document.getElementById("a"+tag).innerHTML = "";
            }
        },
        false
    );
}

function edit_a(id) {
        JsHttpRequest.query(
            '../backend/edit_a.php',
            { 
					'id': id,
					'title': document.getElementById("title").value,
                    'meta_d': document.getElementById("meta_d").value,
                    'meta_k': document.getElementById("meta_k").value,
                    'date': document.getElementById("date").value,
                    'author': document.getElementById("author").value,
                    'desk': document.getElementById("desk").value,
                    'text': document.getElementById("text").value,
                    'spec': document.getElementById("spec").value,
                    'sourse': document.getElementById("sourse").value,
                    'views': document.getElementById("views").value,
					
                    'an_1': document.getElementById("an_1").value,
                    'an_2': document.getElementById("an_2").value,
                    'an_3': document.getElementById("an_3").value,
                    'an_4': document.getElementById("an_4").value,
                    'an_5': document.getElementById("an_5").value,
					
                    'a_1': document.getElementById("a_1").value,
                    'a_2': document.getElementById("a_2").value,
                    'a_3': document.getElementById("a_3").value,
                    'a_4': document.getElementById("a_4").value,
                    'a_5': document.getElementById("a_5").value,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                    document.getElementById("modal_window").innerHTML = result["str2"];
                    document.getElementById("slovo").innerHTML = result["str1"];
                }
            },
            false
        );
    }