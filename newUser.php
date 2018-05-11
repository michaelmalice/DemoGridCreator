<!DOCTYPE html>
<html>
<head>
<title>New User Creator</title>
<style>

        body {
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
        background-color:lightgray;
        text-align: center;
        padding: 10px;
    }

        table, th, td {
                border: 2px solid black;
                border-collapse: collapse;
                empty-cells: hide;
                margin: auto;
                text-align: center;
                padding: 10px;
        }


</style>
</head>

<body>
<h1 style="background-image:url(../../intel.jpg);background-repeat: no-repeat;background-position: center;height: 352px;width: 1500px;margin:auto"></h1>

</br></br></br></br>

<input type="text" name="userName" id="userName">
<button onclick="createNewUser()" id="button">Create User</button>
</br>
<p id="confirmation"></p>
<a id="link"></a>
<script>
function createNewUser() {
	if (document.getElementById("userName").value.length == 0) {
		document.getElementById("confirmation").innerHTML = "Text Field Cannot Be Blank";
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				if (this.responseText === "alreadyExists") {
					document.getElementById("confirmation").innerHTML = "User already exists. Please try again.";
				} else {
					document.getElementById("confirmation").innerHTML = "New user created for " + document.getElementById("userName").value;
					document.getElementById("link").setAttribute('href', this.responseText);
					document.getElementById("link").innerHTML = document.getElementById("userName").value;
				}
			}
		};
		xmlhttp.open("GET", "userCreator.php?q=" + document.getElementById("userName").value, true);
		xmlhttp.send();
	}
}

document.getElementById("userName").addEventListener("keyup", function(event) {
	event.preventDefault();
	if (event.keyCode == 13) {
		document.getElementById("button").click();
	}
});
</script>

</body>
</html>
