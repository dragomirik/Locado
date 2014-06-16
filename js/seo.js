function sitemap_generate(id){
	JsHttpRequest.query(
            '../backend/sitemap_generate.php',
            {
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                document.getElementById("sitemap_log").innerHTML = result["str1"];
				window.location = "#php_report";
                }
            },
            false
        );
	}