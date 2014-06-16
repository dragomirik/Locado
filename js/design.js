	function design_open(id){
		JsHttpRequest.query(
            '../backend/design_open.php',
            { 
					'id'  : id,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("window").innerHTML = result["str1"];
                }
            },
            false
        );
	}
	
	function design_save_1(){
		JsHttpRequest.query(
            '../backend/design_save_1.php',
            { 
				'content1': document.getElementById("content1").value,
				'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("modal_window").innerHTML = result["str"];
				window.location = "#php_report";
                }
            },
            false
        );
	}
	
	function design_save_2(){
		JsHttpRequest.query(
            '../backend/design_save_2.php',
            { 
				'content2': document.getElementById("content2").value,
				'content3': document.getElementById("content3").value,
				'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("modal_window").innerHTML = result["str"];
				window.location = "#php_report";
                }
            },
            false
        );
	}
	
	function design_save_3(){
		JsHttpRequest.query(
            '../backend/design_save_3.php',
            { 
				'content4': document.getElementById("content4").value,
				'content5': document.getElementById("content5").value,
				'content6': document.getElementById("content6").value,
				'content7': document.getElementById("content7").value,
				'content8': document.getElementById("content8").value,
				'content9': document.getElementById("content9").value,
				'content10': document.getElementById("content10").value,
				'content11': document.getElementById("content11").value,
				'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("modal_window").innerHTML = result["str"];
				window.location = "#php_report";
                }
            },
            false
        );
	}