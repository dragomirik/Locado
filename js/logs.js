	function clear_all_logs(){
		JsHttpRequest.query(
            '../backend/clear_all_logs.php',
            { 
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("logs").innerHTML = "Log file is empty";
                }
            },
            false
        );
	}
	
	function logs_change(){
		JsHttpRequest.query(
            '../backend/logs_change.php',
            { 
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("admin_logs").innerHTML = result["str1"];
                }
            },
            false
        );
	}