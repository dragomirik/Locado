function edit_page(id) {
        JsHttpRequest.query(
            '../backend/edit_page.php',
            { 
					'id': id,
					'title': document.getElementById("title").value,
                    'meta_d': document.getElementById("meta_d").value,
                    'meta_k': document.getElementById("meta_k").value,
                    'url': document.getElementById("url").value,
                    'text': document.getElementById("text").value,
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

function add_page() {
if (document.getElementById("menu").checked ===true) {oo = 1;} else {oo =0;}
        JsHttpRequest.query(
            '../backend/add_page.php',
            { 
					'title': document.getElementById("title").value,
                    'meta_d': document.getElementById("meta_d").value,
                    'meta_k': document.getElementById("meta_k").value,
                    'url': document.getElementById("url").value,
                    'text': document.getElementById("text").value,
					'oo' : oo,
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

function del_page(id) {
        JsHttpRequest.query(
            '../backend/del_page.php',
            { 
					'id': id,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("d"+id).style.opacity = "0.5";
                document.getElementById("a"+id).innerHTML = "";
                document.getElementById("modal_window").innerHTML = result["str2"];
				window.location = result["str1"];
                }
            },
            false
        );
    }