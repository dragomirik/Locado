    function login() {
        JsHttpRequest.query(
            '../backend/log.php',
            { 
                'str': document.getElementById("username").value,
				'str1' : document.getElementById("password").value,
				'mem' : document.getElementById("check")
            },
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
                    document.getElementById("ajax_frame").innerHTML = result["obm"];
                    document.getElementById("enter").innerHTML = result["str"];
                }
            },
            false
        );
    }
function wrong_log()
{
	window.location = "#login_432";
}