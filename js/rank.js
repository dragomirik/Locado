function rank_p() {
        JsHttpRequest.query(
            '../backend/rank_p.php',
            {
                    'id': document.getElementById("id").value,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                    document.getElementById("integer").innerHTML = result["str"];
                }
            },
            false
        );
    }
    function rank_m() {
        JsHttpRequest.query(
            '../backend/rank_m.php',
            {
                    'id': document.getElementById("id").value,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                    document.getElementById("integer").innerHTML = result["str"];
                }
            },
            false
        );
    }